<?php

namespace App\Controllers;

use phpDocumentor\Reflection\PseudoTypes\False_;

class Call extends BaseController
{
    public function index()
    {
        $get_data = $this->callAPI('GET', 'http://localhost/rest_api_server/public/employee', false);
        $result = json_decode($get_data, true);

        $data = [
            'judul' => 'Halaman Home',
            'data'  => $result['employees']
        ];
        return view('index', $data);
    }

    public function detail($id)
    {
        $get_data = $this->callAPI('GET', 'http://localhost/rest_api_server/public/employee/' . $id, false);
        $result = json_decode($get_data, true);

        $data = [
            'judul' => 'Halaman Home',
            'data'  => $result['employees']
        ];
        return view('detail', $data);
    }

    public function insert()
    {
        return view('insert');
    }

    public function post()
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email')
        ];
        $post_data = $this->callAPI('POST', 'http://localhost/rest_api_server/public/employee', $data);
        $result = json_decode($post_data, true);

        $message = $result['messages']['success'];

        return redirect()->to('/call');
    }

    public function update($id)
    {
        $get_data = $this->callAPI('GET', 'http://localhost/rest_api_server/public/employee/' . $id, false);
        $result = json_decode($get_data, true);

        $data = [
            'judul' => 'Halaman Edit',
            'data'  => $result['employees']
        ];

        return view('update', $data);
    }

    public function put($id)
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email')
        ];

        $put_data = $this->callAPI('PUT', 'http://localhost/rest_api_server/public/employee/' . $id, $data);
        $result = json_decode($put_data, true);
        $message = $result['messages']['success'];

        return redirect()->to('/call');
    }

    public function delete($id)
    {
        $this->callAPI('DELETE', 'http://localhost/rest_api_server/public/employee/' . $id, false);
        return redirect()->to('/call');
    }


    public function callAPI($method, $url, $data)
    {
        $curl = curl_init();
        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            case "DELETE":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
                curl_setopt($curl, CURLOPT_POSTFIELDS, '');
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        // EXECUTE:
        $result = curl_exec($curl);
        if (!$result) {
            die("Connection Failure");
        }
        curl_close($curl);

        return $result;
    }
}
