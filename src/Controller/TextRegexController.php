<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\TextRegexForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TextRegexController extends AbstractController
{

    #[Route('/parser-text', name: "text")]
    public function index(Request $request): Response
    {
        $form = $this->createForm(TextRegexForm::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $text = $form->get('text')->getData();
            $result = $form->get('getKeys')->isClicked() ? $this->parseKeys($text) : $this->parseTags($text);

            return $this->render(
                'text_regex/index.html.twig',
                [
                    'form' => $form->createView(),
                    'result' => $result,
                ]
            );
        }

        return $this->render('text_regex/index.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @param string $text
     * @return array[]
     */
    public function parseTags(string $text): array
    {
        $text = str_replace('”', '"', $text);
        $tagsToInnerText = [];
        $tagsToDescription = [];

        preg_match_all('/\[(.*?)\](.*?)\[\/(.*?)\]/', $text, $matches);

        foreach ($matches[3] as $index => $tagName) {
            $tagsToInnerText[$tagName] = $matches[2][$index];

            if (strpos($matches[1][$index], 'description=') !== false) {
                preg_match('/description="(.*?)"/', $matches[1][$index], $descriptionMatch);
                $tagsToDescription[$tagName] = $descriptionMatch[1];
            }
        }
        return [$tagsToInnerText, $tagsToDescription];
    }

    /**
     * @param string $text
     * @return array
     */
    private function parseKeys(string $text): array
    {
        $result = [];

        preg_match_all('/(\w+):\s*((?:(?!(?:\w+:)).)*)/', $text, $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            $key = $match[1];
            $value = trim($match[2]);
            $result[$key] = $value;
        }

        return $result;
    }
}
