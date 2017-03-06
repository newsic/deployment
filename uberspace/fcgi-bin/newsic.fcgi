#!/usr/bin/env python3.4

import sys
sys.path.insert(0, "/home/<user>/virtual/<url>/")
from flup.server.fcgi import WSGIServer
from newsic import app

class ScriptNameStripper(object):
	def __init__(self, app):
		self.app = app

	def __call__(self, environ, start_response):
		# when the script should be available in a subfolder (instead of the root of the domain), please set the subfolder here
		# keep it blank otherwise

		environ['SCRIPT_NAME'] = ''
		return self.app(environ, start_response)

app = ScriptNameStripper(app)

if __name__ == '__main__':
	WSGIServer(app).run()