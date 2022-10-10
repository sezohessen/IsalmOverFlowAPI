<?php
namespace  App\Trait;


trait ApiTrait {

    public function errorField($field){
        $massage = __($field.' required');
        return response()->json([
            "msg"    => $massage,
            "status" => false
        ]);
    }
    public function errorMessage($massage,$code){
        return response()->json([
            "msg"           => __($massage),
            "status"        => false,
            "status_code"   => $code
        ]);
    }
    public function SuccessMessage($massage){
        return response()->json([
            "msg"           => __($massage),
            "status"        => true,
            "status_code"   => 200
        ]);
    }
    public function returnSuccess($msg="",$code = 200){
        return response()->json([
            'status'    => true,
            'code'      => $code,
            "msg"       => $msg
        ]);
    }
    public function returnData($key,$value,$msg="",array $extra=[]){
        $data = [
            $key=>$value
        ];
        if (!empty($extra)) {
            foreach ($extra as $key => $value) {
                $data[$key] = $value;
            }
        }
        $data['status'] = true;
        $data['status_code'] = 200;
        $data['msg'] = $msg;
        return response()->json($data);
    }
    public function returnFailData($key,$value,$msg="",array $extra=[]){
        $data = [
            $key=>$value,
            'status'=>false,
            "msg"=>$msg
        ];
        if (!empty($extra)) {
            foreach ($extra as $key => $value) {
                $data[$key] = $value;
            }
        }
        return response()->json($data);
    }

}
