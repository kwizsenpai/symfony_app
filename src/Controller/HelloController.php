<?php

// Voici des exemples de controller

namespace App\Controller; // Ne surtout pas oublier les namespaces /!\ Super important

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;
use App\Service\Greeter;

/**class HelloController1Exemple {

    function hello() {
        return new Response('Hello'); // si type=string le Hello sera transformé en doc html
    }

}
*/
/** AbstractController offre des méthodes auxiliaires (helper methods):
 * Gestion des erreurs | Redirection | Rendu d'un template
 * Quand on utilise une fonction exception 'return' devient 'throw'.
 */
/**class HelloControllerException extends AbstractController {

    function hello() {
        throw $this->createNotFoundException();
    }
};
*/
/**class HelloControllerRedirectHome extends AbstractController {

    function hello() {
        return $this->redirectToRoute('/'); // Permet de renvoyer l'utilisateur à la page d'accueil
    }

}
*/
/**class HelloControllerTwigArray extends AbstractController {

    function hello(): Response {
        $title = "Utilisateurs";
        $users = ["Mickey", "Donald", "Goofy", "Pluto"];
        return $this->render('helloarray.html.twig', // Permet de charger un template twig
            ['title' => $title, 'array' => $users]); // Permet de charger les variables dans le template
    }                                                // à l'aide d'un tableau associatif

};
*/
/**class HelloControllerQuery extends AbstractController {

    public function hello(Request $request) {
        var_dump($request->query);
        var_dump($request->request);
        $params = $request->query->all();
        $string = "Parameters are: <br>";
        foreach($params as $key => $value) {
            $string = sprintf('%s - %s : %s <br>', $string, $key, $value);
            return new Response($string);
        }
    }

}
*/
/**class HelloControllerParam extends AbstractController {

    **
     * @Route("/hello/{param}", requirements={"param"="\d+"}, methods={"GET"})
     * @return Response
     *
    public function helloNumber($param)
    {
        return new Response(sprintf('Hello : number is %s', $param));
    }

    **
     * @Route("/hello/{param}")
     * @return Response
     *
    public function helloDefault($param)
    {
        return new Response(sprintf('Hello %s', $param));
    }
};

*/
/**class HelloControllerParamNameTwig extends AbstractController {

    **
    * @Route("hello")
    *
    public function hello()
    {
        return $this->render('hellodo.html.twig');
    }

    **
    * @Route("hello/{name}", name="helloWithName")
    *
    public function helloWithName($name)
    {
        return new Response(sprintf('Hello %s', $name));
    }
};
*/

/**class HelloControllerLocale extends AbstractController
{
    **
     * @Route({
     *   "fr": "/bonjour",
     *   "en": "/hello"})
     *
    public function hello(Request $request)
    {
        $locale = $request->getLocale();

        return new Response(sprintf('Hello! locale is: %s', $locale));
    }
}
*/

/**class HelloControllerLogger extends AbstractController {

    **
     * @Route("hello")
     *
    function hello(LoggerInterface $logger) {
        $logger->alert('logger !');     // Service logger
        return $this->render('home.html.twig');
    }

}
*/

class HelloController extends AbstractController
{

    /**
     * @Route("hello")
     */
    public function hello(Greeter $greeter)
    {
        $message = $greeter->greet();
        return new Response($message);
    }
}



