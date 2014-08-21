# Title: Intervention list tag for Jekyll
# Author: Mark Donszelmann
# Description: Looks through the "videos" directory and lists all found videos in different formats in a table
#
# Syntax {% interventionlist [template] %}
#
# Example:
# {% interventionlist my_template.html %}
require 'oci8'
require_relative '../config/oracle.rb'

module Jekyll

  class Intervention
    include Convertible

#    attr_accessor :data, :content
    attr_accessor :interventiondata

    def initialize(site, base, dir, name)
      @site = site

      @interventiondata = Hash.new(0)
      @interventiondata['name'] = name
      @interventiondata['title'] = ""
      @interventiondata['time'] = ""
      @interventiondata['dosimeters'] = '<a href="dosimeters.php?InterventionID=' + name + '">Plots</a>'

# not very fast... we could get the full list into a hash
      conn = OCI8.new($conf['user'], $conf['password'], $conf['host'])
      conn.exec('select NAME, UNIX_START from view_interventions where ID='+name) do |row|
        @interventiondata['title'] = row[0].gsub(' ', '&nbsp;')
        @interventiondata['time'] = Time.at(row[1].to_i()).strftime('%a, %e %b %Y %k:%M').gsub(' ', '&nbsp;')
      end

        
      @@videos = []
            
      entries  = Dir.chdir(File.join(base, name)) { site.filter_entries(Dir['*.webm']) }
         
      entries.each do |f|
          @@videos << File.join(dir, name, File.basename(f, '.webm'))
      end
           
      @interventiondata['videos'] = @@videos
        
    end
  end


  class InterventionList
    @@interventions = []

    def self.create(site)
      dir = site.config['interventions_dir'] || '../videos'
      base = File.join(site.source, dir)
      return unless File.exists?(base)

# Does not seem to work... 
      FileUtils.mkdir_p('_site/cern', :verbose => true)
      FileUtils.ln_sf('../../videos', '_site/cern', :verbose => true)

      entries  = Dir.chdir(base) { site.filter_entries(Dir['*']) }
      entries.sort!

      @@interventions = []
      entries.each do |f|
          intervention = Intervention.new(site, base, dir, f)
          @@interventions << intervention.interventiondata
      end
    end

    def self.interventions
      @@interventions
    end
  end


  # Jekyll hook - the generate method is called by jekyll, and generates all of the category pages.
  class GenerateInterventions < Generator
    safe true
    priority :low

    def generate(site)
      InterventionList.create(site)
    end
  end


  class InterventionlistTag < Liquid::Tag
    def initialize(tag_name, markup, tokens)
      @interventions = InterventionList.interventions
      @template_file = markup.strip
      super
    end

    def load_template(file, context)
      includes_dir = File.join(context.registers[:site].source, '_includes')

      if File.symlink?(includes_dir)
        return "Includes directory '#{includes_dir}' cannot be a symlink"
      end

      if file !~ /^[a-zA-Z0-9_\/\.-]+$/ || file =~ /\.\// || file =~ /\/\./
        return "Include file '#{file}' contains invalid characters or sequences"
      end

      Dir.chdir(includes_dir) do
        choices = Dir['**/*'].reject { |x| File.symlink?(x) }
        if choices.include?(file)
          source = File.read(file)
        else
          "Included file '#{file}' not found in _includes directory"
        end
      end

    end

    def render(context)
      output = super
      template = load_template(@template_file, context)

      Liquid::Template.parse(template).render('interventions' => @interventions).gsub(/\t/, '')
    end
  end


end

Liquid::Template.register_tag('interventionlist', Jekyll::InterventionlistTag)
