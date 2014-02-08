include_recipe "openssl"
include_recipe "mysql::server"
include_recipe "database::mysql"

mysql_database "#{node['project']['name']}" do
  connection ({:host => "localhost", :username => 'root', :password => node['mysql']['server_root_password']})
  action :create
end

# Creates the project mysql user and grants access
mysql_database_user "#{node['project']['name']}" do
  connection ({:host => "localhost", :username => 'root', :password => node['mysql']['server_root_password']})
  password "#{node['project']['name']}"
  database_name "#{node['project']['name']}"
  host 'localhost'
  privileges [:all]
  action :create
  action :grant
end