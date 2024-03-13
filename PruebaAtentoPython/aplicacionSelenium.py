import selenium
import os
from selenium import webdriver
from selenium.webdriver.common.by import By
#from selenium.webdriver.chrome.service import Service
import time

"""url = ''
path_driver=os.chdir('C:\driver')
driver=webdriver.Chrome(executable_path='chromedriver')
time.sleep(10)"""

class Store_Sele(webdriver.Chrome):
    def __init__(self, driver_path='C:\driver\chromedriver', teardown=False):
        self.driver_path=driver_path
        self.teardown=teardown

        super(Store_Sele,self).__init__()
        self.maximize_window

