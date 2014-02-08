include_recipe "apache2"

case node[:project][:type]
when 'php'
  include_recipe "apache2::mod_php5"
  # using apt
  package "php5-mysql"
end

include_recipe "apache2::mod_rewrite"

apache_module "include"

web_app "#{node['project']['name']}" do
  server_name "#{node['project']['name']}.local"
  server_aliases ["#{node['project']['name']}.local"]
  docroot "/home/vagrant/workspace/#{node['project']['name']}/web"
  allow_override "All"
end