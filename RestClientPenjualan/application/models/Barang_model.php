<?php

use GuzzleHttp\Client;

class Barang_model extends CI_Model{

	private $_client;

	function __construct(){
		parent:: __construct();
		$this->_client = new Client([
            'base_uri' => 'http://localhost/RestFull/RestServerPenjualan/api/'
            //,'auth' => ['admin','admin']
        ]);
	}

	function tampil_barang(){
		$response = $this->_client->request('GET','barang',
       [
            'query' => [
                'keyapipenjualan' => 'p3nju4l4n'
            ]
       ]);

       return $result = json_decode($response->getBody()->getContents(), true);
    return $result['data'];
	}

	function tampil_stok_barang(){
		$response = $this->_client->request('GET','barang/stokBarang',
       [
            'query' => [
                'keyapipenjualan' => 'p3nju4l4n'
            ]
       ]);

       return $result = json_decode($response->getBody()->getContents(), true);
    return $result['data'];
	}

	function get_kode_barang(){
		$response = $this->_client->request('GET','barang/kdBarang',
       [
            'query' => [
                'keyapipenjualan' => 'p3nju4l4n'
            ]
       ]);

       return $result = json_decode($response->getBody()->getContents(), true);
    return $result['data'];
	}

    function insertBarang(){
		$data = [
            "kd_barang" => (string) $this->input->post('kd_barang'),
            "nama_barang" => (string) $this->input->post('nama_barang'),
			"jml_barang" => (int) $this->input->post('jml_barang'),
            "harga_pcs" => (int) $this->input->post('harga_pcs'),
            "poto" => (int) $this->input->post('poto'),
            "keterangan" => (int) $this->input->post('keterangan'),
            'keyapipenjualan' => 'p3nju4l4n'
        ];

        $response = $this->_client->request('POST','barang',
       [
            'form_params' => $data
       ]);

       $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
    

	function hapus_data($id){

        $data = [
            'keyapipenjualan' => 'p3nju4l4n',
            'kd_barang' => $id
        ];

		$response = $this->_client->request('DELETE','barang',
       [
            'form_params' => $data
       ]);

       
       $result = json_decode($response->getBody()->getContents(), true);
        return $result;
        
        
	}
    

	function edit_data($id){		
		$response = $this->_client->request('GET','barang',
       [
            'query' => [
				'keyapipenjualan' => 'p3nju4l4n',
				'kd_barang' => $id
            ]
       ]);

       $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
	}

	function update_data(){
		$data = [
            "kd_barang" => $this->input->post('kd_barang', true),
            "nama_barang" => $this->input->post('nama_barang', true),
			"jml_barang" => $this->input->post('jml_barang', true),
            "harga_pcs" => $this->input->post('harga_pcs', true),
            "poto" => $this->input->post('poto', true),
            "keterangan" => $this->input->post('keterangan', true),
            'keyapipenjualan' => 'p3nju4l4n'
        ];

        $response = $this->_client->request('PUT','barang',
       [
            'form_params' => $data
       ]);

       $result = json_decode($response->getBody()->getContents(), true);
        return $result;
	}


}
?>