"""import selenium
import os
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import time

url = 'https://www.falabella.com/falabella-cl'


service = Service(executable_path=r'C:\driver\chromedriver.exe')


driver = webdriver.Chrome(service=service)

driver.get(url)


botoncerrar = driver.find_element(By.XPATH,'//div[@class="dy-lb-close"]')
botoncerrar.click()


busqueda = driver.find_element(By.XPATH,'//input[@id="testId-SearchBar-Input"]')
busqueda.send_keys('prueba')
botonBuscar = driver.find_element(By.XPATH,'//button[@class="SearchBar-module_searchBtnIcon__2L2s0"]')
botonBuscar.click()

time.sleep(60)




driver.quit()"""

