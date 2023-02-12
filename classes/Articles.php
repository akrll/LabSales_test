<?
namespace LabSales;

class Articles
{
    
    private $AuthLogin = 'labsales_test';
    private $AythPassword = '18765gR5';


    protected  function getCategories()
    {
        $url = 'https://test.labsales.ru/tasks/articles/rest/categories';
        $res = self::curlGET($url);
        return $res;
    }

    protected  function getArticles($categoryId = '')
    {
        if(empty($categoryId))
            return false;

        $url = "https://test.labsales.ru/tasks/articles/rest/category/$categoryId";
        $res = self::curlGET($url);
        return $res;
    }

    protected  function getArticle($articleId = '')
    {
        if(empty($articleId))
            return false;

        $url = "https://test.labsales.ru/tasks/articles/rest/article/$articleId";
        $res = self::curlGET($url);
        return $res;
    }

    private function curlGET($url = '', $getParams = [])
    {
        if(empty($url))
            return false;

        if(!empty($getParams))
        {
            $url.= "?" . http_build_query($getParams);
        }

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
        
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_USERPWD => $this->AuthLogin . ':' . $this->AythPassword,
        ]);

        $response = json_decode(curl_exec($curl), true);
        curl_close($curl);

        if(!empty($response['error']))
        {
            return false;
        }
        if(!empty($response['data']))
        {
            return($response['data']);
        }
    }

    public function getData()
    {
        $result = [];
        
        $result['categories'] = self::getCategories();

        if($result['categories'])
        {
            foreach($result['categories'] as $key=>$category)
            {
                $articles = self::getArticles($category['category_id']);
                if(!empty($articles))
                {
                    foreach($articles as $aKey=>$article)
                    {
                        $result['categories'][$key]['articles'][] = self::getArticle($article['article_id']);
                    }
                    unset($articles);
                }
            }
        }
        return $result;
    }

}