
<?php
if (!function_exists('reportErrorsMessage')) {
    function reportErrorsMessage($e): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => false,
            'code' => $e->getCode(),
            'message' => $e->getMessage(),
        ]);
    }
}
