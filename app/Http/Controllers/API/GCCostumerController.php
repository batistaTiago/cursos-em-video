<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\GCCostumerUpdateProfileRequest;
use App\Http\Requests\API\GCNewCostumerRequest;
use App\Models\GCCostumer;
use Hash;
use Illuminate\Http\Request;

class GCCostumerController extends Controller
{

    public function register(GCNewCostumerRequest $request)
    {
        try {
            $costumer = GCCostumer::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'document_code' => $request->document_code,
            ]);

            return ResponseController::created($costumer);
        } catch (\Throwable $e) {
            return ResponseController::notAcceptable("Dados inválidos!");
        }

    }

    public function login(GCCostumerLoginRequest $request)
    {
        try {
            $costumer = GCCostumer::where('email', $request->email)->first();

            if (!isset($costumer) or !Hash::check($request->password, $costumer->password)) {
                return ResponseController::notFound('Email e/ou senha inválidos!');
            }

            return ResponseController::success($costumer);
        } catch (\Throwable $e) {
            return ResponseController::internalServerError($e->getMessage());
        }

    }

    public function getProfile(Request $request)
    {
        try {
            $costumer = GCCostumer::where('email', $request->email)->orWhere('document_code', $request->document_code)->first();

            if (!isset($costumer)) {
                return ResponseController::notFound('Cliente não encontrado');
            }

            return ResponseController::success($costumer);
        } catch (\Throwable $e) {
            return ResponseController::internalServerError($e->getMessage());
        }
    }

    public function updateProfile(GCCostumerUpdateProfileRequest $request)
    {
        try {
            $costumer = GCCostumer::find($request->costumer_id);

            if (isset($request->new_password)) {
                if (Hash::check($request->current_password, $costumer->password)) {
                    $costumer->password = $requert->new_password;
                } else {
                    return ResponseController::unauthorized('Senha incorreta');
                }
            }

            $costumer->name = $request->name ?? $costumer->name;
            $costumer->password = $request->password ?? $costumer->password;
            $costumer->phone_number = $request->phone_number ?? $costumer->phone_number;
            $costumer->save();

            return ResponseController::success($costumer);
        } catch (\Throwable $e) {
            return ResponseController::internalServerError($e->getMessage());
        }
    }
}
