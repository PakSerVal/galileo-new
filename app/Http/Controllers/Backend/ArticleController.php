<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\Requests\CreateArticleRequest;
use App\Http\Controllers\Backend\Requests\EditArticleRequest;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use View;

class ArticleController extends Controller {
	const ACTION_INDEX       = 'index';
	const ACTION_CREATE_FORM = 'createForm';
	const ACTION_CREATE      = 'create';
	const ACTION_EDIT_FORM   = 'editForm';
	const ACTION_EDIT        = 'edit';
	const ACTION_DELETE      = 'delete';

	/** @var ArticleRepository */
	private $articles;

	/**
	 * @param  ArticleRepository $repository
	 */
	public function __construct(ArticleRepository $repository) {
		$this->articles = $repository;
	}

	public function index() {
		$articles = $this->articles->getAll();

		return View::make('backend.articles.list', compact('articles'));
	}

	public function createForm() {
		$article = new Article();

		return View::make('backend.articles.create', compact('article'));
	}

	public function create(CreateArticleRequest $request) {
		$article                 = new Article();
		$article->title          = $request->title;
		$article->content        = $request->content;
		$article->is_published   = $request->is_published ?? false;
		$article->thumb_image_id = $request->image_id;
		$article->preview_text   = $request->preview_text;
		$article->priority       = $request->priority;

		if ($article->save()) {
			return redirect()->action(static::getActionUrl(static::ACTION_INDEX));
		}

		return redirect()->action(static::getActionUrl(static::ACTION_CREATE_FORM));
	}

	public function editForm(int $id) {
		$article = Article::find($id);

		return View::make('backend.articles.edit', compact('article'));
	}

	public function edit(EditArticleRequest $request) {
		$article = Article::find($request->id);

		if (null === $article) {
			return redirect()->action(static::getActionUrl(static::ACTION_EDIT_FORM));
		}

		$article->title          = $request->title;
		$article->content        = $request->content;
		$article->is_published   = $request->is_published ?? false;
		$article->preview_text   = $request->preview_text;
		$article->priority       = $request->priority;

		if (null !== $request->image_id) {
			$article->thumb_image_id = $request->image_id;
		}

		if ($article->save()) {
			return redirect()->action(static::getActionUrl(static::ACTION_INDEX));
		}

		return redirect()->action(static::getActionUrl(static::ACTION_EDIT_FORM));
	}

	public function delete(int $id) {
		$article = Article::find($id);
		if (null === $article) {
			return redirect()->action(static::getActionUrl(static::ACTION_INDEX));
		}

		$article->delete();

		return redirect()->action(static::getActionUrl(static::ACTION_INDEX));
	}
}
