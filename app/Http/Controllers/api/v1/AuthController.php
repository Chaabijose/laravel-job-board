<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Connexion utilisateur
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        /*  $token = auth('api')->attempt($credentials);

         if (!$token) {
             return response(['message' => 'Unauthorized access!'], 401);
         }

         return response([
             'access_token' => $token,
             'expires_in' => auth('api')->factory()->getTTL() * 60
         ]); */

        try {
            $token = auth('api')->attempt($credentials);

            if (!$token) {
                return response()->json([
                    'success' => false,
                    'message' => 'Identifiants invalides'
                ], 401);
            }

            return response()->json([
                'success' => true,
                'message' => 'Connexion réussie',
                'data' => [
                    'user' => auth('api')->user(),
                    'access_token' => $token,
                    'expires_in' => auth('api')->factory()->getTTL() * 60
                ]
            ]);

        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Impossible de créer le token'
            ], 500);
        }
    }

    /**
     * Obtenir l'utilisateur authentifié
     */
    public function me(LoginRequest $request)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();

            return response()->json([
                'success' => true,
                'data' => [
                    'user' => $user
                ]
            ]);
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Token invalide'
            ], 401);
        }
    }

    /**
     * Déconnexion (invalider le token)
     */
    public function logout(LoginRequest $request)
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());

            return response()->json([
                'success' => true,
                'message' => 'Déconnexion réussie'
            ]);
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Échec de la déconnexion'
            ], 500);
        }
    }

    /**
     * Rafraîchir le token
     */
    public function refresh(LoginRequest $request)
    {
        try {
            $newToken = JWTAuth::refresh(JWTAuth::getToken());

            return response()->json([
                'success' => true,
                'message' => 'Token rafraîchi avec succès',
                'data' => [
                    'token' => $newToken,
                    'token_type' => 'bearer',
                    'expires_in' => auth()->factory()->getTTL() * 60
                ]
            ]);
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Impossible de rafraîchir le token'
            ], 401);
        }
    }

}
