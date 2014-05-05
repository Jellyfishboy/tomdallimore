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

# Paths
set :asset_path, "assets"
set :theme_path, "wp-content/themes/tomdallimore"
set :coffee_to_path, "js"
set :coffee_dir, "src/coffee"
set :js_file_name, "application.js"

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
    # desc "Set sitemap file permissions"
    # task :sitemap, :roles => :app do
    #     run "chmod 666 /var/www/tomdallimore/current/sitemap.xml"
    #     run "chmod 666 /var/www/tomdallimore/current/sitemap.xml.gz"
    # end
    desc "Set root folder permissions to www-data"
    task :root, :roles => :app do
        run "chown -R www-data:www-data /var/www/tomdallimore"
    end
end
namespace :assets do
    desc "Compile Sass/Compass"
        task :sass, :roles => :app do
            #compile and upload sass files
            run_locally( "cd #{theme_path}/#{asset_path}; compass compile" )
            upload( "#{theme_path}/#{asset_path}/css", "#{release_path}/#{theme_path}/#{asset_path}/css" )
    end
    desc "Compile Coffeescript"
        task :coffee, :roles => :app do
            run_locally( "cd #{theme_path}/#{asset_path}; coffee -c -o #{coffee_to_path} -j #{js_file_name} #{coffee_dir}")
            upload( "#{theme_path}/#{asset_path}/js", "#{release_path}/#{theme_path}/#{asset_path}/js" )
    end
    desc "Upload sprite"
    task :sprite, :roles => :app do
        upload( "#{theme_path}/#{asset_path}/img/icono*.png", "#{release_path}/#{theme_path}/#{asset_path}/img" )
    end
end
namespace :clean do
    desc "Remove sQlite database file"
    task :sqlite, :roles => :app do
        run "rm /var/www/tomdallimore/current/wp-content/db.php"
    end
end

after :deploy, "assets:sass"
after "assets:sass", "assets:coffee"
after "assets:coffee", "configure:symlinks"
after "configure:symlinks", "configure:database"
# after "configure:database", "permissions:sitemap"
after "configure:database", "permissions:root"
after "permissions:root", "clean:sqlite"