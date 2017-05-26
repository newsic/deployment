#!/usr/bin/env python3.6

RELATIVE_WEB_URL_PATH = '/'
import sys
sys.path.insert(0, "/home/<user>/virtual/<url>/")

from flipflop import WSGIServer
from newsic import app

class ScriptNamePatch(object):
  def __init__(self, app):
    self.app = app
  def __call__(self, environ, start_response):

    # when the script should be available in a subfolder (instead of the root of the$
    # keep it blank otherwise
    environ['SCRIPT_NAME'] = ''
    return self.app(environ, start_response)

app = ScriptNamePatch(app)

if __name__ == '__main__':
  WSGIServer(app).run()

