#!/usr/bin/env python3.4
import sys
sys.path.insert(0, "/home/tcsn/virtual/newsic.tocsin.de")
from flup.server.fcgi import WSGIServer
from newsic import app
if __name__ == '__main__':
    WSGIServer(app).run()
