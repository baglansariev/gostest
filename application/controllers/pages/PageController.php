<?php
    namespace controllers\pages;
    use core\engine\Controller;

    class PageController extends Controller
    {
        // Home page
        public function home()
        {
            $this->view->asset->setMetaDesc('Одним из потребительских кооперативов является потребительский кооператив «Асар Казына», созданный в соответствии с решением учредительного собрания кооператива (протокол от «01» июня 2018 года) как добровольное объединение граждан на основе их членства в целях удовлетворения потребностей в приобретении движимого и недвижимого имущества.');
            $this->view->asset->setMetaKeys('Купить недвижимость в рассрочку в Шымкенте, Купить недвижимость в рассрочку, асар казына, asarkazyna, asarkazyna.kz');
            $this->view->asset->setTitle('Адал тест. Онлайн мемлекеттік тестке дайындау');
            $this->view->asset->setCss('/public/style/css/main-slide.css');

            $language = $this->load->language('pages/common');

            $data['main_slide'] = $this->load->controller('modules/mainSlide');
            $data['featureboxes'] = $this->load->controller('modules/featureBox');
            $data['services'] = $this->load->controller('modules/services')->getServicesList();
            $data['advantages'] = $this->load->controller('modules/advantages');

            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');

            $this->view->response('pages/home', $data);
        }
    }