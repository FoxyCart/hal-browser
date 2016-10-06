HAL.Views.Documenation = Backbone.View.extend({
  className: 'documentation',

  render: function(url) {
    this.$el.height(500).html('<iframe src="' + url + '?layout=false"></iframe>');
  }
});
