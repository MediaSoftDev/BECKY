# BECKY
## Description

This is a software of application. Becky v.1 Framework with PHP using the Pattern MVC.

## Installation
Using PHP 7 preferably.

## DataBase
Using MYSQL preferably.

## Usage
```html
$ git clone https://github.com/DanielArturoAlejoAlvarez/BECKY.git [NAME APP]

```
Follow the following steps and you're good to go! Important:


![alt text](https://mattstauffer.com/assets/images/content/allautocomplete.gif)


## Coding

### Connection DB

```php
...
function __construct(){
            try{
                $this->dbh = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbName, $this->user,$this->pass);
                $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                $this->error=$e->getMessage();
                echo $this->error;
            }
        }
...
```

### Libraries 
```php
...
function __construct(){    
    $url=$this->get_url();          
    if(file_exists('../app/controllers/' .ucwords($url[0]). '.php')){
        $this->current_controller=ucwords($url[0]);
        unset($url[0]);
    }
    require_once "../app/controllers/" .$this->current_controller. ".php";    
    $this->current_controller=new $this->current_controller;    
    if(isset($url[1])){
        if(method_exists($this->current_controller, $url[1])){
            $this->current_method=$url[1];
            unset($url[1]);
        }
    }
    $this->params=$url ? array_values($url) : [];
    call_user_func_array([$this->current_controller, $this->current_method], $this->params);
}
...
```

### Models
```php
...
class User{
        private $db;
        function __construct(){
            $this->db=new Base();
        }

        public function getUsers(){
            $this->db->query("SELECT * FROM users");
            return $this->db->getRows();
        }
    }
...
```

### Controllers
```php
...
public function index(){            
    
    $users=$this->user->getUsers();

    $data=[
        'title' =>  'Page Index',
        'users' =>  $users 
    ];

    $this->view('pages/index', $data);
...
}
```

### Views
```php
foreach($data['users'] as $user){
    echo $user->name;
}
```

## Contributing

Bug reports and pull requests are welcome on GitHub at https://github.com/DanielArturoAlejoAlvarez/BECKY. This project is intended to be a safe, welcoming space for collaboration, and contributors are expected to adhere to the [Contributor Covenant](http://contributor-covenant.org) code of conduct.


## License

The gem is available as open source under the terms of the [MIT License](http://opensource.org/licenses/MIT).