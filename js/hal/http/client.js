HAL.Http.Client = function(opts) {
  this.vent = opts.vent;
  this.defaultHeaders = { 'Accept': 'application/hal+json, application/json, */*; q=0.01' };
};

HAL.Http.Client.prototype.filterHostName = function(url) {
  var link = document.createElement("a");
  link.href = url;
  if (link.hostname != window.location.hostname) {
    console.log('invalid url domain for ' + window.location.hostname + ': ' + link.hostname);
    url = '/';
  }
  return url;
};

HAL.Http.Client.prototype.get = function(url) {
  var self = this;
  url = this.filterHostName(url);
  this.vent.trigger('location-change', { url: url });
  var jqxhr = $.ajax({
    url: url,
    dataType: 'json',
    headers: this.defaultHeaders,
    success: function(resource, textStatus, jqXHR) {
      self.vent.trigger('response', {
        resource: resource,
        jqxhr: jqXHR,
        headers: jqXHR.getAllResponseHeaders()
      });
    }
  }).error(function() {
    self.vent.trigger('fail-response', { jqxhr: jqxhr });
  });
};

HAL.Http.Client.prototype.request = function(opts) {
  var self = this;
  opts.dataType = 'json';
  opts.url = this.filterHostName(opts.url);
  self.vent.trigger('location-change', { url: opts.url });
  return jqxhr = $.ajax(opts);
};

HAL.Http.Client.prototype.updateDefaultHeaders = function(headers) {
  this.defaultHeaders = headers;
};

HAL.Http.Client.prototype.getDefaultHeaders = function() {
  return this.defaultHeaders;
};
