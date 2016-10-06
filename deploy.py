#!/usr/bin/env python3.4

import os
import sys
import shutil

username = os.getlogin()
urlpath = input('Path to newsic /home/{}/virtual/'.format(username))
copypath = '{user}/virtual/fcgi-bin'.format(user=username)


os.chdir(os.path.join(os.path.dirname(os.path.abspath(__file__)), 'uberspace'))
try:
    os.makedirs(copypath)
except OSError:
    pass

fcgi_file = ''

with open('fcgi-bin/newsic.fcgi')as source:
    for line in source:
        fcgi_file += line.replace('/home/<user>/virtual/<url>',
                                  '/home/{user}/virtual/{url}'.format(
                                      user=username, url=urlpath))

with open(copypath + '/newsic.fcgi', 'w') as destination:
    destination.write(fcgi_file)
