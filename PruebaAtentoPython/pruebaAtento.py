import tkinter
from tkinter import messagebox
import requests

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

def abrirBusqueda():
    ventanaBusqueda = tkinter.Tk()
    ventanaBusqueda.geometry("600x600")
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