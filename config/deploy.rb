set :application, 'tomdallimore'
set :user, 'root'
set :scm, 'git'
set :repository, 'git@github.com:Jellyfishboy/tomdallimore.git'
set :scm_verbose, true
set :domain, '146.185.130.90'
set :deploy_to, '/var/www/tomdallimore/'
set :branch, 'master'

server domain, :app, :web, :db, :primary => true

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
        run "cp /var/www/wpconfig/tomdallimore/wp-config-production.php /var/www/tomdallimore/current"
    end
end
namespace :permissions do
    desc "Set sitemap file permissions"
    task :sitemap_permissions, :roles => :app do
        run "chmod 666 /var/www/tomdallimore/current/sitemap.xml"
        run "chmod 666 /var/www/tomdallimore/current/sitemap.xml.gz"
    end
    desc "Set root folder permissions to www-data"
    task :root, :roles => :app do
        run "chown -R www-data:www-data /var/www/tomdallimore"
    end
end
namespace :assets do
    desc "Install Bower dependencies"
    task :bower, :roles => :app do
      run "cd /home/gimsonrobotics/current && sudo bower install --allow-root"
    end
    desc "Install node dependencies"
    task :node, :roles => :app do
      run "cd /home/gimsonrobotics/current && npm install"
    end
    desc "Compile assets with Grunt"
    desc :compile, :roles => :app do
        run "cd /home/gimsonrobotics/curent && grunt production"
    end
end

after :deploy, "assets:node"
after "assets:node", "assets:bower"
after "assets:bower", "assets:compile"
after "assets:compile", "configure:symlinks"
after "configure:symlinks", "configure:database"
after "configure:database", "permissions:sitemap"
after "permissions:sitemap", "permissions:root"