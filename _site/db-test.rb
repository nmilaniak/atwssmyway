# run as: ruby -rubygems db-test.rb

require 'oci8'
require_relative 'config/oracle.rb'

conn = OCI8.new($conf['user'], $conf['password'], $conf['host'])
conn.exec('select NAME, UNIX_START from view_interventions order by ID') do |row|
  puts row[0]
  puts row[1]
end


