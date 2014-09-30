### Controllers

**Each controller should list service dependencies through private getter with typehint**

```php
class ProductController extends Controller
{
    /**
     * @return ProductRepository
     */
    public function getProductRepository()
    {
        return $this->getManager()->getRepository('Shop:Product');
    }
    
    /**
     * @return SomeService
     */
    public function getSomeService()
    {
        return $this->get('some_service');
    }
}
```

Objectives:

1. Highlight controller dependencies. Basically it's kind of light version of 'Controller as Service' concept.
2. Get typehint for services and entities repositories.

Mistakes:

1. Don't try to put all repositories and services in base controller. Of course, you will met objective #2, but lost #1.

**Don't use phpdoc (@param/@return) for controller actions**

```php
class CategoryController extends Controller
{
    /**
     * @Framework\Route("/categories/{id}", name="category_view")
     * @Framework\ParamConverter("category")
     * @Framework\Template
     */
    public function viewAction(Category $category)
    {
        return [
            'category' => $category,
            'products' => $this->getProductRepository()->findTopProductsByCategory($category)
        ];
    }
}
```

Objectives:

1. Recuce number of comments for actions

Reasoning:

`@param` annotation is useless for actions cause in 95% action arguments are object of specific class, e.g. Response or Category, and we hint class in argument.
In other case (e.g. $id) it will be string as route param.

`@return` annotation is useless too cause usually action never called manually, and we don't need know return type.
Moreover in most cases action returns data which then transformed to Response via anotations (like Framework\Template).

**Always use annotation namespace**

```php
class CategoryController extends Controller
{
    /**
     * @Framework\Route("/categories/{id}", name="category_view")
     * @Security\Secure(roles="ROLE_USER")
     * @Framework\Template
     */
    public function viewAction(Category $category)
    {
        return [
            'category' => $category,
            'products' => $this->getProductRepository()->findTopProductsByCategory($category)
        ];
    }
}
```

**Put action annotations in specific order**

1. Documentation annotations (e.g. @ApiDoc/ApiDoc)
2. Routing annotations (e.g. @Framework/Route, @Rest/Post)
3. Param converters annotations (e.g. @Framework/ParamConverter)
4. Security annotations (e.g. @Security/Secure, @Security/SecureParam)
5. View/templating annotations (e.g. @Framework/Template, @Rest/View)

Order highligh request flow: route -> convert -> secure -> render


```php
class CategoryController extends Controller
{
    /**
     * @Framework\Route("/categories/{id}", name="category_view")
     * @Framework\ParamConverter("category")
     * @Security\SecureParam(name="category", permissions="VIEW")
     * @Framework\Template
     */
    public function viewAction(Category $category)
    {
        return [
            'category' => $category,
            'products' => $this->getProductRepository()->findTopProductsByCategory($category)
        ];
    }
}

class UserApiController extends Controller
{
    /**
     * Create new user
     *
     * @ApiDoc\Doc(section="users", description="Create user")
     *
     * @Rest\Patch("/users/{id}")
     * @Framework\ParamConverter("user", converter="fos.body_param_converter")
     * @Security\SecureParam(name="user", permissions="EDIT")
     * @Rest\View
     */
    public function updateAction(User $user)
    {
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush($user);
        
        return $user;
    }
}
```

Objectives:

1. Keep actions configurations similar

**Use createBoundedForm helper to handle forms**

TODO: example of form submit

### Domain, entities, repositores, doctrine, etc

**Use EntityRepository:persist() only for new entities**

... and don't use persist for 100% update operations

TODO: provide example

**Use cascade persist/remove in associations**

TODO: provide example, doctrine manual reference, explanations how it works

**Rules about immutable properties in entity**

TODO: example, why we show take care about it, etc

**BusinessBehaviorException in entities and repositories**

TODO: example, why we should throw exception instead of ignoring, why we need care about preconditions, etc

**Use full namespace for classes outside domain/bundle**

If you have FOS/User and Acme/Bundle you should use full namespace or at least with prefix to prevent dual meaning.

TODO: example, explations, possible solutions

**Use translator for constant titles**

.. and don't define titles in entites or whatever.











