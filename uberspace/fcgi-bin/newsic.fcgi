#!/usr/bin/env python3.4

import sys
sys.path.insert(0, "/home/<user>/virtual/<url>/")
from flup.server.fcgi import WSGIServer
from newsic import app

class ScriptNameStripper(object):
   def __init__(self, app):
       self.app = app

   def __call__(self, environ, start_response):
       environ['SCRIPT_NAME'] = ''
       return self.app(environ, start_response)

app = ScriptNameStripper(app)

if __name__ == '__main__':
    WSGIServer(app).run()