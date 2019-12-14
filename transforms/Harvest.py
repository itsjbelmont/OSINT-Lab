from maltego_trx.entities import Email
from maltego_trx.maltego import UIM_PARTIAL
from maltego_trx.transform import DiscoverableTransform

import io
import os
import re
import subprocess
from subprocess import call

class Harvest(DiscoverableTransform):
    """
    Runs theharvester using various data sources and returns any email addresses matching the domain.
    """

    @classmethod
    def create_entities(cls, request, response):
        domain = request.Value
        harvester = 'theharvester'

        try:
            subprocess.call(['theharvester'],stdout=subprocess.DEVNULL, stderr=subprocess.DEVNULL)
        except OSError as e:
            harvester = 'theHarvester' 
        
        try:
            sources = ['google', 'bing']
            f = open('./log.txt', 'w')
            for source in sources:
                getResults = subprocess.Popen([harvester,'-d',domain,
                    '-b',source],stdout=f,stderr=f)
                rc = getResults.wait()
                if rc == 0:
                    return_code = 0
            f.close()

            hits = 0
            if return_code == 0:
                f = open('./log.txt', 'r')
                for line in f:
                    matches  = re.findall(r'[\w\.-]+@[\w\.-]+', line)
                    for match in matches:
                        if match != "cmartorella@edge-security.com": 
                            hits += 1
                            response.addEntity(Email, match)

            if hits == 0:
                response.addUIMessage('No emails found :(')

        except IOError:
            response.addUIMessage("An error occured during IO", messageType=UIM_PARTIAL)

