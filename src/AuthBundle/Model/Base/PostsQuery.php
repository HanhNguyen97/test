<?php

namespace AuthBundle\Model\Base;

use \Exception;
use \PDO;
use AuthBundle\Model\Posts as ChildPosts;
use AuthBundle\Model\PostsQuery as ChildPostsQuery;
use AuthBundle\Model\Map\PostsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'posts' table.
 *
 *
 *
 * @method     ChildPostsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildPostsQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildPostsQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildPostsQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method     ChildPostsQuery orderByDescribe($order = Criteria::ASC) Order by the describe column
 * @method     ChildPostsQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     ChildPostsQuery orderByDateCreate($order = Criteria::ASC) Order by the date_create column
 * @method     ChildPostsQuery orderByDelete($order = Criteria::ASC) Order by the delete column
 *
 * @method     ChildPostsQuery groupById() Group by the id column
 * @method     ChildPostsQuery groupByItemid() Group by the itemid column
 * @method     ChildPostsQuery groupByTitle() Group by the title column
 * @method     ChildPostsQuery groupByContent() Group by the content column
 * @method     ChildPostsQuery groupByDescribe() Group by the describe column
 * @method     ChildPostsQuery groupByImage() Group by the image column
 * @method     ChildPostsQuery groupByDateCreate() Group by the date_create column
 * @method     ChildPostsQuery groupByDelete() Group by the delete column
 *
 * @method     ChildPostsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPostsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPostsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPostsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPostsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPostsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPostsQuery leftJoinItems($relationAlias = null) Adds a LEFT JOIN clause to the query using the Items relation
 * @method     ChildPostsQuery rightJoinItems($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Items relation
 * @method     ChildPostsQuery innerJoinItems($relationAlias = null) Adds a INNER JOIN clause to the query using the Items relation
 *
 * @method     ChildPostsQuery joinWithItems($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Items relation
 *
 * @method     ChildPostsQuery leftJoinWithItems() Adds a LEFT JOIN clause and with to the query using the Items relation
 * @method     ChildPostsQuery rightJoinWithItems() Adds a RIGHT JOIN clause and with to the query using the Items relation
 * @method     ChildPostsQuery innerJoinWithItems() Adds a INNER JOIN clause and with to the query using the Items relation
 *
 * @method     \AuthBundle\Model\ItemsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPosts findOne(ConnectionInterface $con = null) Return the first ChildPosts matching the query
 * @method     ChildPosts findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPosts matching the query, or a new ChildPosts object populated from the query conditions when no match is found
 *
 * @method     ChildPosts findOneById(int $id) Return the first ChildPosts filtered by the id column
 * @method     ChildPosts findOneByItemid(int $itemid) Return the first ChildPosts filtered by the itemid column
 * @method     ChildPosts findOneByTitle(string $title) Return the first ChildPosts filtered by the title column
 * @method     ChildPosts findOneByContent(string $content) Return the first ChildPosts filtered by the content column
 * @method     ChildPosts findOneByDescribe(string $describe) Return the first ChildPosts filtered by the describe column
 * @method     ChildPosts findOneByImage(string $image) Return the first ChildPosts filtered by the image column
 * @method     ChildPosts findOneByDateCreate(string $date_create) Return the first ChildPosts filtered by the date_create column
 * @method     ChildPosts findOneByDelete(int $delete) Return the first ChildPosts filtered by the delete column *

 * @method     ChildPosts requirePk($key, ConnectionInterface $con = null) Return the ChildPosts by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPosts requireOne(ConnectionInterface $con = null) Return the first ChildPosts matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPosts requireOneById(int $id) Return the first ChildPosts filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPosts requireOneByItemid(int $itemid) Return the first ChildPosts filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPosts requireOneByTitle(string $title) Return the first ChildPosts filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPosts requireOneByContent(string $content) Return the first ChildPosts filtered by the content column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPosts requireOneByDescribe(string $describe) Return the first ChildPosts filtered by the describe column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPosts requireOneByImage(string $image) Return the first ChildPosts filtered by the image column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPosts requireOneByDateCreate(string $date_create) Return the first ChildPosts filtered by the date_create column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPosts requireOneByDelete(int $delete) Return the first ChildPosts filtered by the delete column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPosts[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPosts objects based on current ModelCriteria
 * @method     ChildPosts[]|ObjectCollection findById(int $id) Return ChildPosts objects filtered by the id column
 * @method     ChildPosts[]|ObjectCollection findByItemid(int $itemid) Return ChildPosts objects filtered by the itemid column
 * @method     ChildPosts[]|ObjectCollection findByTitle(string $title) Return ChildPosts objects filtered by the title column
 * @method     ChildPosts[]|ObjectCollection findByContent(string $content) Return ChildPosts objects filtered by the content column
 * @method     ChildPosts[]|ObjectCollection findByDescribe(string $describe) Return ChildPosts objects filtered by the describe column
 * @method     ChildPosts[]|ObjectCollection findByImage(string $image) Return ChildPosts objects filtered by the image column
 * @method     ChildPosts[]|ObjectCollection findByDateCreate(string $date_create) Return ChildPosts objects filtered by the date_create column
 * @method     ChildPosts[]|ObjectCollection findByDelete(int $delete) Return ChildPosts objects filtered by the delete column
 * @method     ChildPosts[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PostsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \AuthBundle\Model\Base\PostsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'test', $modelName = '\\AuthBundle\\Model\\Posts', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPostsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPostsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPostsQuery) {
            return $criteria;
        }
        $query = new ChildPostsQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPosts|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PostsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PostsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPosts A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `itemid`, `title`, `content`, `describe`, `image`, `date_create`, `delete` FROM `posts` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildPosts $obj */
            $obj = new ChildPosts();
            $obj->hydrate($row);
            PostsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildPosts|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildPostsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PostsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPostsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PostsTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PostsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PostsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the itemid column
     *
     * Example usage:
     * <code>
     * $query->filterByItemid(1234); // WHERE itemid = 1234
     * $query->filterByItemid(array(12, 34)); // WHERE itemid IN (12, 34)
     * $query->filterByItemid(array('min' => 12)); // WHERE itemid > 12
     * </code>
     *
     * @see       filterByItems()
     *
     * @param     mixed $itemid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostsQuery The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, $comparison = null)
    {
        if (is_array($itemid)) {
            $useMinMax = false;
            if (isset($itemid['min'])) {
                $this->addUsingAlias(PostsTableMap::COL_ITEMID, $itemid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($itemid['max'])) {
                $this->addUsingAlias(PostsTableMap::COL_ITEMID, $itemid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostsTableMap::COL_ITEMID, $itemid, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostsQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostsTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the content column
     *
     * Example usage:
     * <code>
     * $query->filterByContent('fooValue');   // WHERE content = 'fooValue'
     * $query->filterByContent('%fooValue%', Criteria::LIKE); // WHERE content LIKE '%fooValue%'
     * </code>
     *
     * @param     string $content The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostsQuery The current query, for fluid interface
     */
    public function filterByContent($content = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($content)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostsTableMap::COL_CONTENT, $content, $comparison);
    }

    /**
     * Filter the query on the describe column
     *
     * Example usage:
     * <code>
     * $query->filterByDescribe('fooValue');   // WHERE describe = 'fooValue'
     * $query->filterByDescribe('%fooValue%', Criteria::LIKE); // WHERE describe LIKE '%fooValue%'
     * </code>
     *
     * @param     string $describe The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostsQuery The current query, for fluid interface
     */
    public function filterByDescribe($describe = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($describe)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostsTableMap::COL_DESCRIBE, $describe, $comparison);
    }

    /**
     * Filter the query on the image column
     *
     * Example usage:
     * <code>
     * $query->filterByImage('fooValue');   // WHERE image = 'fooValue'
     * $query->filterByImage('%fooValue%', Criteria::LIKE); // WHERE image LIKE '%fooValue%'
     * </code>
     *
     * @param     string $image The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostsQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($image)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostsTableMap::COL_IMAGE, $image, $comparison);
    }

    /**
     * Filter the query on the date_create column
     *
     * Example usage:
     * <code>
     * $query->filterByDateCreate('2011-03-14'); // WHERE date_create = '2011-03-14'
     * $query->filterByDateCreate('now'); // WHERE date_create = '2011-03-14'
     * $query->filterByDateCreate(array('max' => 'yesterday')); // WHERE date_create > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateCreate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostsQuery The current query, for fluid interface
     */
    public function filterByDateCreate($dateCreate = null, $comparison = null)
    {
        if (is_array($dateCreate)) {
            $useMinMax = false;
            if (isset($dateCreate['min'])) {
                $this->addUsingAlias(PostsTableMap::COL_DATE_CREATE, $dateCreate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreate['max'])) {
                $this->addUsingAlias(PostsTableMap::COL_DATE_CREATE, $dateCreate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostsTableMap::COL_DATE_CREATE, $dateCreate, $comparison);
    }

    /**
     * Filter the query on the delete column
     *
     * Example usage:
     * <code>
     * $query->filterByDelete(1234); // WHERE delete = 1234
     * $query->filterByDelete(array(12, 34)); // WHERE delete IN (12, 34)
     * $query->filterByDelete(array('min' => 12)); // WHERE delete > 12
     * </code>
     *
     * @param     mixed $delete The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostsQuery The current query, for fluid interface
     */
    public function filterByDelete($delete = null, $comparison = null)
    {
        if (is_array($delete)) {
            $useMinMax = false;
            if (isset($delete['min'])) {
                $this->addUsingAlias(PostsTableMap::COL_DELETE, $delete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($delete['max'])) {
                $this->addUsingAlias(PostsTableMap::COL_DELETE, $delete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostsTableMap::COL_DELETE, $delete, $comparison);
    }

    /**
     * Filter the query by a related \AuthBundle\Model\Items object
     *
     * @param \AuthBundle\Model\Items|ObjectCollection $items The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPostsQuery The current query, for fluid interface
     */
    public function filterByItems($items, $comparison = null)
    {
        if ($items instanceof \AuthBundle\Model\Items) {
            return $this
                ->addUsingAlias(PostsTableMap::COL_ITEMID, $items->getId(), $comparison);
        } elseif ($items instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PostsTableMap::COL_ITEMID, $items->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByItems() only accepts arguments of type \AuthBundle\Model\Items or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Items relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPostsQuery The current query, for fluid interface
     */
    public function joinItems($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Items');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Items');
        }

        return $this;
    }

    /**
     * Use the Items relation Items object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AuthBundle\Model\ItemsQuery A secondary query class using the current class as primary query
     */
    public function useItemsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinItems($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Items', '\AuthBundle\Model\ItemsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPosts $posts Object to remove from the list of results
     *
     * @return $this|ChildPostsQuery The current query, for fluid interface
     */
    public function prune($posts = null)
    {
        if ($posts) {
            $this->addUsingAlias(PostsTableMap::COL_ID, $posts->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the posts table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PostsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PostsTableMap::clearInstancePool();
            PostsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PostsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PostsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PostsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PostsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PostsQuery
