require('lib/setup')

Spine = require('spine')
_ = require('underscore/underscore')

class App extends Spine.Controller
  constructor: ->
    super
    $ ->
		console.log "does the proxy work?"


module.exports = App
