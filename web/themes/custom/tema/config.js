 module.exports = {
  browserSync: {
    hostname: "local.aarome.test",
    port: 8080,
    openAutomatically: true,
    reloadDelay: 0,
    injectChanges: true
  },

  drush: {
    enabled: false,
    alias: {
      css_js: 'drush @SITE-ALIAS cc css-js',
      cr: 'drush @SITE-ALIAS cr'
    }
  },

  twig: {
    useCache: true
  }
};
