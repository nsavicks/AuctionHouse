<?php
	
	class NewAuction extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model("Auction");
			$this->load->model("AuctionCategories");
		}

		private function loadPageLayout($page, $content=[]){
            $header_content["controller"] = "Register";
            $header_content["page_title"] = "Register";
            $header_content["page_icon"] = "register";

            $this->load->view("header.php", $header_content);
            $this->load->view($page, $content);
            $this->load->view("footer.php");

        }

        private function filesUploaded() {

           //print_r($_FILES);

		   if(isset($_FILES['auction-pictures']) ){  

				foreach($_FILES['auction-pictures']['tmp_name'] as $key => $tmp_name ){

				      if(!empty($_FILES['auction-pictures']['tmp_name'][$key])){
				      	return true;
				      }
				    
				}
			}
			

			return false;

		}

		public function index(){

			if ($this->session->has_userdata("user")){

				$content["categories"] = $this->AuctionCategories->getAllCategories();
				$this->loadPageLayout("pages/NewAuction", $content);

			}
			else{
				// Not logged in
				redirect("InfoMessage/PageNotFound");
			}

		}

		public function Submit(){

			if ($this->session->has_userdata("user")){

				$data["auction_owner"] = $this->session->userdata("user")->username;
				$data["auction_name"] = $this->input->post("auction-name");
				$data["category"] = $this->AuctionCategories->getCategoryId($this->input->post("category"));
				$data["duration"] = $this->input->post("duration");
				$data["starting_price"] = $this->input->post("start-price");
				$data["item_condition"] = $this->input->post("item-condition");
				$data["auction_description"] = $this->input->post("auction-description");
				$data["create_time"] = date("Y-m-d H:i:s");
				$data["auction_state"] = "Pending confirmation";
				$data["auction_pictures"] = "";

				if ($this->filesUploaded()){
					$path = $_FILES["auction-pictures"]["name"];
					$path = str_replace(' ', '_', $path);
					$data["auction_pictures"] = implode(",",$path);
				}

				$this->Auction->createNewAuction($data);

				$id = $this->Auction->getUsersLastAuctionId($data["auction_owner"]);

				if ($this->filesUploaded()){

					$path = "UPLOAD/auctions/" . $id;

					if (!file_exists($path)){
						mkdir($path, 0777, true);
					}

					$config["upload_path"] = $path . "/";
					$config["allowed_types"] = 'gif|jpg|png';
					$config['max_size'] = '10240';

					$files = $_FILES;
					$cnt = count($_FILES["auction-pictures"]["name"]);

					for ($i = 0; $i < $cnt; $i++){

						$_FILES['auction-pictures']['name']= $files['auction-pictures']['name'][$i];
				        $_FILES['auction-pictures']['type']= $files['auction-pictures']['type'][$i];
				        $_FILES['auction-pictures']['tmp_name']= $files['auction-pictures']['tmp_name'][$i];
				        $_FILES['auction-pictures']['error']= $files['auction-pictures']['error'][$i];
				        $_FILES['auction-pictures']['size']= $files['auction-pictures']['size'][$i]; 

				        $this->upload->initialize($config);

				        if (!$this->upload->do_upload("auction-pictures")){
				        	rmdir($path);
				        	$this->Auction->deleteAuction($id);
				        	echo $this->upload->display_errors();
				        	return;
		            		redirect("InfoMessage/PictureUploadFailed");
				        }

					}

				}

				redirect("InfoMessage/AuctionAddedSuccess");

			}
			else{
				// Not logged in
				redirect("InfoMessage/PageNotFound");
			}

		}

	}

?>