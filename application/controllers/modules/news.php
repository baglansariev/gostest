<?php
    namespace controllers\modules;
    use core\engine\Controller;
    use controllers\modules\owlGallery;
    use core\lib\Pagination;

    class News extends Controller
    {
        public $lang;

        public function __construct()
        {
            parent::__construct();
            $this->lang = $this->load->language('pages/common');
        }

        public function getList($limit = false, $pagination = false)
        {
            $news_model = $this->load->model('modules/news');
            $data = array();
            $news = $news_model->getList($limit, $this->lang->language_id);

            $data['local_news_title'] = $this->lang->get('local_news_title');

            if($pagination){
                $totalNews = $news_model->getTotalNews()['count'];
                $pagination = new Pagination($limit, $totalNews, $this->request->getUriWithoutParams());
                $data['pages_viewport'] = $pagination->pagesViewPort(5);
                $news = $news_model->getList(['from' => $pagination->from, 'notes' => $limit], $this->lang->language_id);
            }


            $data['news']  = array();
            if($news){
                foreach ($news as $key => $item) {
                    $data['news'][$key]['id'] = $item['id'];
                    $data['news'][$key]['title'] = $item['title'];
                    $data['news'][$key]['short_desc'] = $item['short_desc'];
                    $data['news'][$key]['main_img'] = $item['main_img'];
                    $data['news'][$key]['date_insert'] = $item['date_insert'];
                }
            }

            return $this->load->view('modules/news/news-list', $data);
        }

        public function article()
        {
            $article_id = $this->getArticleId();
            $owl_gallery = new OwlGallery;
            $data = array();
            $data['article'] = array();

            if((int)$article_id > 0){
                $news_model = $this->load->model('modules/news');
                $article_data = $news_model->getOneArticle($article_id);

                if($article_data){
                    foreach($article_data as $key => $article) {
                        $data['article'][$key]['id'] = $article['id'];
                        $data['article'][$key]['title'] = $article['title'];
                        $data['article'][$key]['full_desc'] = $article['full_desc'];
                        $data['article'][$key]['main_img'] = $article['main_img'];
                        $data['article'][$key]['date_insert'] = $article['date_insert'];

                        if($news_model->getImagesOfArticle($article_id)){
                            $data['article'][$key]['news_images'] = $owl_gallery->getImages($news_model->getImagesOfArticle($article_id));
                        }

                        $data['article'][$key]['news_videos'] = $news_model->getVideosOfArticle($article_id);
                    }
                }
            }

            return $this->load->view('modules/news/news-page', $data);
        }

        private function getArticleId()
        {
            $arr = explode('/', $this->request->getUriWithoutParams());
            $needle = array_search('show', $arr);

            if($needle){
                return $arr[$needle + 1];
            }
            return false;
        }
    }