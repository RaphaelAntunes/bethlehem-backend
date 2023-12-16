<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     version="1.0",
 *     title="API SERVING",
 *     description="API para popular sistema",
 * )
 *  * @OA\SecurityScheme(
 *    securityScheme="bearerAuth",
 *    in="header",
 *    name="bearerAuth",
 *    type="http",
 *    scheme="bearer",
 *    bearerFormat="JWT",
 * ),
 */


class JWTAuthController extends Controller
{
    /**
     * @OA\Schema(
     *     schema="User",
     *     type="object",
     *     @OA\Property(property="id", type="integer"),
     *     @OA\Property(property="name", type="string"),
     *     @OA\Property(property="email", type="string"),
     *     // ... adicione outras propriedades conforme necessário
     * )
     */

    /**
     * @OA\Post(
     *     path="/api/login",
     *     summary="Autenticação do usuário",
     *     tags={"JWT Auth"},
     *     description="Autentica um usuário e retorna o token de acesso.",
     *     operationId="login",
     *     requestBody={
     *         "required": true,
     *         "description": "Credenciais de autenticação",
     *         "content": {
     *             "application/json": {
     *                 "example": {"email": "ibb@admin.com", "password": "123"}
     *             }
     *         }
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Usuário autenticado com sucesso",
     *         @OA\JsonContent(
     *             @OA\Property(property="access_token", type="string"),
     *             @OA\Property(property="token_type", type="string", example="bearer"),
     *             @OA\Property(property="expires_in", type="integer", example=3600),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Credenciais inválidas",
     *     ),
     * )
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $token_ = $this->respondWithToken($token);
        return $token_;
    }
   /**
 * @OA\Post(
 *     path="/api/me",
 *     summary="Obter usuário autenticado",
 *     tags={"JWT Auth"},
 *     description="Retorna as informações do usuário autenticado.",
 *     operationId="me",
 *     security={{"bearerAuth": {}}},
 *   
 *       @OA\Response(
 *         response=200,
 *         description="Informações do usuário autenticado",
 *         @OA\JsonContent(
 *             @OA\Property(property="email", type="string", example="user@domain.com"),
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="name", type="string", example="UserName"),
 *             @OA\Property(property="email_verified_at", type="string", format="date-time", example=null),
 *             @OA\Property(property="created_at", type="string", format="date-time", example=null),
 *             @OA\Property(property="updated_at", type="string", format="date-time", example=null),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autorizado",
 *     ),
 * )

 */

    public function me()
    {
        return response()->json(['user' => auth('api')->user()]);
    }

       /**
 * @OA\Post(
 *     path="/api/logout",
 *     summary="Realizar invalidação do Token",
 *     tags={"JWT Auth"},
 *     description="Invalida o Token Barrer fazendo assim o logout",
 *     operationId="logout",
 *     security={{"bearerAuth": {}}},
 *   
 *       @OA\Response(
 *         response=200,
 *         description="Resposta",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Successfully logged out"),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autorizado",
 *     ),
 * )

 */

    public function logout()
    {
        auth('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
