import requests
import urllib.request
import time
import re
import os
import sys
from bs4 import BeautifulSoup
from selenium import webdriver
from selenium.webdriver.firefox.options import Options

def main():

    # get args
    target = ''
    if len(sys.argv) > 1:
        target = sys.argv[1].replace(' ', '+')

    # intialize values
    if target == '':
        target = 'obama+ssn+DOB'
    url = 'https://pastebin.com/search?q='+target
    raw_url = 'https://pastebin.com/raw/'

    # run firefox webdriver headlessly
    options = Options()
    options.headless = True
    driver = webdriver.Firefox()

    # get search results and scroll to the bottom and wait 10 secs for load
    driver.get(url)
    driver.execute_script("window.scrollTo(0, document.body.scrollHeight);var lenOfPage=document.body.scrollHeight;return lenOfPage;")
    time.sleep(10)

    # # click through first 10 search result pages
    # p = 2
    # pages = driver.find_elements_by_class_name("gsc-cursor-page");
    # for page in pages:
    #     if p == int(page.text):
    #         page.click()
    #         p = p + 1

    # find elements by class name
    results = driver.find_element_by_class_name('gsc-expansionArea')
    elements = results.find_elements_by_class_name('gsc-webResult')

    # create empty array to store links
    links = []

    # loop over elements to extract unique pasteid and urls
    for element in elements:
        paste = element.find_element_by_class_name('gs-visibleUrl-long')
        link = paste.text
        pasteid = link.rsplit('/', 1)[-1]
        url = raw_url + pasteid
        # append dict to array
        links.append({"url": url, "pasteid" : pasteid})
    print(links)

    # quit driver
    driver.quit()

    # create new paste directory if one does not already exist
    paste_dir = './pastebin'
    try:
        os.makedirs(paste_dir)
    except OSError:
        print ("could not create directory %s" % paste_dir)
    else:
        print ("successfully created directory %s" % paste_dir)

    # loop over links and scrape each page, wait two seconds so that you don't get blocked
    for link in links:
        urllib.request.urlretrieve(link['url'],'./pastebin/'+link['pasteid'])
        time.sleep(2)

if __name__ == "__main__":
	main()
