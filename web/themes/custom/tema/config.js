 module.exports = {
  browserSync: {
    hostname: "local.aarome.local",
    port: 8080,
    openAutomatically: true,
    reloadDelay: 0,
    injectChanges: true
  },

  drush: {
    enabled: true,
    alias: {
      css_js: 'drush @SITE-ALIAS cc css-js',
      cr: 'drush @SITE-ALIAS cr'
    }
  },

  twig: {
    useCache: true
  }
};
