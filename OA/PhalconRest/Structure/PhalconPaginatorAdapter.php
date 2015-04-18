<?php

namespace OA\PhalconRest\Structure;

use League\Fractal\Pagination\PaginatorInterface;
use Phalcon\Paginator\AdapterInterface as PaginatorAdapterInterface;
use Phalcon\Di\InjectionAwareInterface;
use Phalcon\DiInterface;

class PhalconPaginatorAdapter implements PaginatorInterface, InjectionAwareInterface
{
  protected $di;

  protected $perPage;

  public function setPaginator(PaginatorAdapterInterface $paginator)
  {
    $this->paginate = $paginator->getPaginate();
  }

  public function setPerPage($perPage)
  {
    $this->perPage = $perPage;
  }

  public function setDI (DiInterface $dependencyInjector)
  {
    $this->di = $dependencyInjector;
  }

  public function getDI ()
  {
    return $this->di;
  }

	public function getCurrentPage()
	{
		return $this->paginate->current;
	}

  /**
   * Get the last page.
   *
   * @return int
   */
  public function getLastPage()
  {
  	return $this->paginate->last;
  }

  /**
   * Get the total.
   *
   * @return int
   */
  public function getTotal()
  {
  	return $this->paginate->total_items;
  }

  /**
   * Get the count.
   *
   * @return int
   */
  public function getCount()
  {
  	return count($this->paginate->items);
  }

  /**
   * Get the number per page.
   *
   * @return int
   */
  public function getPerPage()
  {
  	return $this->perPage;
  }

  /**
   * Get the url for the given page.
   *
   * @param int $page
   *
   * @return string
   */
  public function getUrl($page)
  {
  	$uri = $this->di['router']->getRewriteUri();
  	$query = $this->di['request']->getQuery();
  	$query['page'] = $page;

    //for built-in server
    unset($query['_url']);

  	$query_string = http_build_query($query);

  	return $uri . '?' . $query_string;
  }
}