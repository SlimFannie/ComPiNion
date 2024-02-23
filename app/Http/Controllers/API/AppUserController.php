<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\API\DataController as DataController;
use App\User;
use Validator;
use App\Http\Resources\User as UserResource;

class AppUserController extends DataController
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

    }

    public function users() {
        $users = User::all();

        return $this->sendResponse($users, 'Les utilisateurs ont été trouvés avec succès.');
    }

}
