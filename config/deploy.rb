set :application, 'tomdallimore'
set :user, 'root'
set :scm, 'git'
set :repository, 'git@github.com:Jellyfishboy/tomdallimore.git'
set :scm_verbose, true
set :domain, '146.185.130.90'
set :branch, 'master'

server domain, :app, :web, :db, :primary => true

# Multiple deployment targets
set :stages, %w(production staging)
set :default_stage, "staging"
require 'capistrano/ext/multistage'

# Only keep the latest 3 releases
set :keep_releases, 3
after "deploy:restart", "deploy:cleanup"

# deploy config
set :deploy_via, :remote_cache
set :copy_exclude, [".git", ".DS_Store", ".gitignore", ".gitmodules"]
set :use_sudo, false

# additional settings
default_run_options[:pty] = true


namespace :configure do
    desc "Setup symlinks for a wordpress project"
    task :symlinks, :roles => :app do
        run "ln -nfs #{shared_path}/uploads #{release_path}/wp-content/uploads"
    end
    desc "Copy production config file across"
    task :database, :roles => :app do 
        run "cp #{config_dir} #{current_path}"
    end
end
namespace :permissions do
    # desc "Set sitemap file permissions"
    # task :sitemap, :roles => :app do
    #     run "chmod 666 /var/www/tomdallimore/current/sitemap.xml"
    #     run "chmod 666 /var/www/tomdallimore/current/sitemap.xml.gz"
    # end
    desc "Set root folder permissions to www-data"
    task :root, :roles => :app do
        run "chown -R www-data:www-data #{current_path}/."
    end
end
namespace :assets do
    desc "Install Bower dependencies"
    task :bower, :roles => :app do
      run "cd #{current_path}/wp-content/themes/tomdallimore && sudo bower install --allow-root"
    end
    desc "Install node dependencies"
    task :node, :roles => :app do
      run "cd #{current_path}/wp-content/themes/tomdallimore && npm install"
    end
    desc "Compile assets with Grunt"
    task :compile, :roles => :app do
      run "cd #{current_path}/wp-content/themes/tomdallimore && grunt production --force"
    end
end
namespace :clean do
    desc "Remove sQlite database configuration"
    task :sqlite, :roles => :app do
        run "rm #{current_path}/wp-content/db.php"
    end
end
after :deploy, "assets:node"
after "assets:node", "assets:bower"
after "assets:bower", "clean:sqlite"
after "clean:sqlite", "configure:symlinks"
after "configure:symlinks", "configure:database"
# after "configure:database", "permissions:sitemap"
after "configure:database", "permissions:root"
after "permissions:root", "assets:compile"