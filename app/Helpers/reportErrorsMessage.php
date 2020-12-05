
<?php
if (!function_exists('reportErrorsMessage')) {
    function reportErrorsMessage($e)
    {
        return response()->json([
            'status' => false,
            'code' => $e->getCode(),
            'message' => $e->getMessage(),
        ]);
    }
}
