import tkinter
from tkinter import messagebox
import requests
import selenium
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.support import expected_conditions as EC
from urllib.request import urlopen
from PIL import Image, ImageTk
import time

ventana = tkinter.Tk()
ventana.geometry("400x200")

etiquetaUser = tkinter.Label(ventana, text="Usuario")
etiquetaUser.pack()

textboxUser = tkinter.Entry(ventana)
textboxUser.pack()

etiquetaPswd = tkinter.Label(ventana, text="Clave")
etiquetaPswd.pack()

textboxPswd = tkinter.Entry(ventana)
textboxPswd.pack()

def abrirApi():
    ventanaApi = tkinter.Tk()
    ventanaApi.geometry("600x600")
    for i in range (1,8):
        mostrarPersonajes(ventanaApi, i)       
    ventanaApi.mainloop()

photo_list = [] 

def mostrarProductos(ventanaBusqueda, producto):
    url = 'https://www.falabella.com/falabella-cl'
    service = Service(executable_path=r'C:\driver\chromedriver.exe')
    driver = webdriver.Chrome(service=service)
    driver.get(url)
    botoncerrar = driver.find_element(By.XPATH,'//div[@class="dy-lb-close"]')
    botoncerrar.click()
    busqueda = driver.find_element(By.XPATH,'//input[@id="testId-SearchBar-Input"]')
    busqueda.send_keys(producto)
    botonBuscar = driver.find_element(By.XPATH,'//button[@class="SearchBar-module_searchBtnIcon__2L2s0"]')
    botonBuscar.click()
    time.sleep(5)
    productos = driver.find_elements(By.XPATH,'//b[contains(@id,"testId-pod-displaySubTitle")]')
    precios = driver.find_elements(By.XPATH,'//span[contains(@class,"copy10 primary medium jsx-280445118 normal       line-height-22")]')
    #imagenes = driver.find_elements(By.XPATH,'//img[contains(@class,"jsx-1996933093")]')
    productos_reversos = productos[::-1] 
    precios_reversos = precios[::-1] 
    for i in range(10):
        tkinter.Label(ventanaBusqueda, text=f"Producto: {productos_reversos[i].text}, Precio: {precios_reversos[i].text}").pack()
    driver.quit()

def abrirBusqueda():
    ventanaBusqueda = tkinter.Toplevel()
    ventanaBusqueda.geometry("600x600")
    etiquetaBusqueda = tkinter.Label(ventanaBusqueda, text="Ingresa un producto:").pack()
    textboxBusqueda = tkinter.Entry(ventanaBusqueda)
    textboxBusqueda.pack()
    botonBuscar = tkinter.Button(ventanaBusqueda, text="Buscar", command=lambda: mostrarProductos(ventanaBusqueda, textboxBusqueda.get()))
    botonBuscar.pack()
    ventanaBusqueda.mainloop()

def validacionAcceso():
    user = textboxUser.get()
    pswd = textboxPswd.get()
    if user == "usuario1" and pswd == "clave1":
        abrirApi()
    elif user == "usuario2" and pswd == "clave2":
        abrirBusqueda()
    else:
        messagebox.showinfo("Error","Acceso incorrecto")
            
botonIngresar = tkinter.Button(ventana, text="Ingresar", command=validacionAcceso)
botonIngresar.pack()

def mostrarPersonajes(ventanaApi, id):
    idPersonaje = id
    api = f"https://rickandmortyapi.com/api/character/{idPersonaje}"
    llamado = requests.get(api)
    if llamado.status_code == 200:
        personaje = llamado.json()
        tkinter.Label(ventanaApi, text=f"Nombre: {personaje['name']}").pack()
        tkinter.Label(ventanaApi, text=f"Especie: {personaje['species']}").pack()
        tkinter.Label(ventanaApi, text=f"Genero: {personaje['gender']}").pack()
        tkinter.Label(ventanaApi, text=f"Estado: {personaje['status']}").pack()
ventana.mainloop()
