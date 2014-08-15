<?php
class ModelModuleBlog extends Model {
	public function getPosts($data = array()) {
		if ($data) {
			$sql = "SELECT * FROM " . DB_PREFIX . "blog b LEFT JOIN " . DB_PREFIX . "blog_description bd ON (b.blog_id = bd.blog_id) WHERE b.status = 1 AND b.date <= NOW() AND bd.language_id = '" . (int)$this->config->get('config_language_id') . "'";
			
			$sort_data = array(
				'sort_order',
			);
			
			if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
				$sql .= " ORDER BY " . $data['sort'];
			} else {
				$sql .= " ORDER BY sort_order";
			}
			
			if (isset($data['order']) && ($data['order'] == 'ASC')) {
				$sql .= " ASC";
			} else {
				$sql .= " DESC";
			}
			
			if (isset($data['start']) || isset($data['limit'])) {
				if ($data['start'] < 0) {
					$data['start'] = 0;
				}

				if ($data['limit'] < 1) {
					$data['limit'] = 20;
				}
				
				$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
			}
			
			$query = $this->db->query($sql);
			
			return $query->rows;
		} else {
			$blog_data = $this->cache->get('blog');
			
			if (!$blog_data) {
				$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "blog b LEFT JOIN " . DB_PREFIX . "blog_description bd ON (b.blog_id = bd.blog_id) WHERE b.status = 1 AND b.date <= NOW() ORDER BY sort_order DESC");

				$blog_data = $query->rows;
			
				$this->cache->set('blog', $blog_data);
			}
		 
			return $blog_data;
		}
	}

	public function getTotalPosts() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "blog b WHERE b.date <= NOW() AND b.status = 1");
		
		return $query->row['total'];
	}

	
	public function getPost($blog_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "blog b LEFT JOIN " . DB_PREFIX . "blog_description bd ON (b.blog_id = bd.blog_id) WHERE b.blog_id = '" . (int)$blog_id . "' AND bd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND b.status = 1 AND b.date <= NOW()");

		return $query->row;
	}

    public function getIdByTitle($postTitle) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "blog b LEFT JOIN " . DB_PREFIX . "blog_description bd ON (b.blog_id = bd.blog_id) WHERE bd.title = '" . $postTitle . "' AND bd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND b.status = 1 AND b.date <= NOW()");

        if (isset($query->row['blog_id'])) {
            // if there is a blog entry for this title
            return $query->row['blog_id'];
        } else {
            // no blog entry for the title
            return null;
        }
    }

    /**
     *  Get link to post by post title
     */
    public function getPostLinkByTitle($postTitle) {
      $blog_id = $this->getIdByTitle($postTitle);
      if ($blog_id) {
          $linkName = 'Читать статьи о пользе и инструкции по применению';
          return '<a target="_blank" href="index.php?route=module/blog/view&blog_id='.$blog_id.'">'.$linkName.'</a>';
      } else {
          return null;
      }
    }

	public function getPreviousPost($blog_id) {
		$current_post = $this->getPost($blog_id);
    	
		if (!empty($current_post['blog_id'])) {
			$sql = "SELECT b.* FROM " . DB_PREFIX . "blog b WHERE b.sort_order < '" . $current_post['sort_order'] . "' AND b.status = 1 AND b.date <= NOW() ORDER BY b.sort_order DESC LIMIT 1";

			$query = $this->db->query($sql);

			return $query->row;
		} else {
			return array();
		}
	}

	public function getNextPost($blog_id) {
		$current_post = $this->getPost($blog_id);

		if (!empty($current_post['blog_id'])) {
			$sql = "SELECT b.* FROM " . DB_PREFIX . "blog b WHERE b.sort_order > '" . $current_post['sort_order'] . "' AND b.status = 1 AND b.date <= NOW() ORDER BY b.sort_order ASC LIMIT 1";

			$query = $this->db->query($sql);
			
			return $query->row;
		} else {
			return array();
		}
	}
}
?>
