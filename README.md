# LabSales

Есть некий сервис с которым нужно произвести интеграцию и вывести на странице статьи выгруженные из данного сервиса.

Со стороны сервиса для интеграции реализовано Rest API :

В запросах используется Basic Authentication

логин авторизации: ---

пароль авторизации: ---

Для запросов используем PHP cURL. В ответы на запросы приходит JSON

array( 'data' => array(), 'error' => '' ); в массиве data это массив с запрашиваемыми данными, error строка с ошибкой в случае неудачи

Запрос списка категорий статей https://test.labsales.ru/tasks/articles/rest/categories

Запрос списка статей в категории https://test.labsales.ru/tasks/articles/rest/category/{category_id} где {category_id} это идентификатор категории полученный из запроса списка категорий

Запрос данных конкретной статьи https://test.labsales.ru/tasks/articles/rest/article/{article_id} где {article_id} это идентификатор статьи полученный в запросе списка статей

Для выполнения задания Вам необходимо создать файл ( php или html ) в котором реализовать php скрипт для запроса данных статей и вывод их в html по категориям