<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casas;

class CasaController extends Controller
{
   // Mostrar formulario de edición
   public function edit($id) {
       $casa = Casas::findOrFail($id);

       // Verifica si el usuario es admin
       if (auth()->user()->is_admin) {
           return view('control.editarCasaAdmin', compact('casa')); // Vista para admin
       } else {
           return view('control.editarCasa', compact('casa')); // Vista para usuario regular
       }
   }

   // Método para actualizar datos de la casa
   public function update(Request $request, $id) {
       $request->validate([
           'numero_casa' => 'required',
           'calle' => 'required',
           'tipo_almacenamiento' => 'required',
           'propietario' => 'required',
       ]);

       $casa = Casas::findOrFail($id);
       $casa->update($request->all());

       if (auth()->user()->is_admin) {
           return redirect()->route('control.admin')->with('success', 'Casa actualizada correctamente.');
       } else {
           return redirect()->route('control.index')->with('success', 'Casa actualizada correctamente.');
       }
   }

   // Mostrar formulario de edición (solo admin)
   public function editAdmin($id) {
       $casa = Casas::findOrFail($id);
       return view('control.editarCasaAdmin', compact('casa'));
   }

   // Método para actualizar datos de la casa (solo admin)
   public function updateAdmin(Request $request, $id) {
       $request->validate([
           'numero_casa' => 'required',
           'calle' => 'required',
           'tipo_almacenamiento' => 'required',
           'propietario' => 'required',
       ]);

       $casa = Casas::findOrFail($id);
       $casa->update($request->all());

       return redirect()->route('control.admin')->with('success', 'Casa actualizada correctamente.');
   }

   // Eliminar casa (usuario regular)
   public function destroy($id) {
       $casa = Casas::findOrFail($id);
       $casa->delete();

       // Redirige según el tipo de usuario
       if (auth()->user()->is_admin) {
           return redirect()->route('control.admin')->with('success', 'Casa eliminada correctamente.');
       } else {
           return redirect()->route('control.index')->with('success', 'Casa eliminada correctamente.');
       }
   }

   // Eliminar casa (solo admin)
   public function destroyAdmin($id) {
       $casa = Casas::findOrFail($id);
       $casa->delete();

       return redirect()->route('control.admin')->with('success', 'Casa eliminada correctamente.');
   }

   // Método para mostrar la vista de botonAdmin
   public function botonAdmin()
   {
       return view('control.botonAdmin');  // Ruta de la vista botonAdmin
   }
}
