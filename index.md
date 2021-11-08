## Seja bem vindo a página do php_for_server 

```php_for_server
Ela conta com a inclusão da mini api splitesql 

# SliteSQL

## Função/Classe principal
[link](https://github.com/tricioandrade/php_for_server/blob/main/app/controller/domain/request.php)
   
 `  
1. $this->setConnection();
2. $json = file_get_contents('php://input'); 
3. var_dump($json);
4. $obj = json_decode($json, JSON_OBJECT_AS_ARRAY);
5. function arrayKey($obj, $param){
6.    if(!empty($param) && is_array($obj)):
7.      Query::sql_insert("${param}", $obj);
8.        if(Query::is_true()) 
9.          print_r('true');
10.           exit;
11.             endif;
12.             }
13.             
`
### Suporte ou Contacto

### [Email](tricioandrade@outlook.com)
