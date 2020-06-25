<?php

namespace AuthBundle\Model\Map;

use AuthBundle\Model\User;
use AuthBundle\Model\UserQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'user' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class UserTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'AuthBundle.Model.Map.UserTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'test';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'user';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\AuthBundle\\Model\\User';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'AuthBundle.Model.User';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 15;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 15;

    /**
     * the column name for the makh field
     */
    const COL_MAKH = 'user.makh';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'user.name';

    /**
     * the column name for the account field
     */
    const COL_ACCOUNT = 'user.account';

    /**
     * the column name for the password field
     */
    const COL_PASSWORD = 'user.password';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'user.email';

    /**
     * the column name for the dateregister field
     */
    const COL_DATEREGISTER = 'user.dateregister';

    /**
     * the column name for the birthday field
     */
    const COL_BIRTHDAY = 'user.birthday';

    /**
     * the column name for the gender field
     */
    const COL_GENDER = 'user.gender';

    /**
     * the column name for the address field
     */
    const COL_ADDRESS = 'user.address';

    /**
     * the column name for the describe field
     */
    const COL_DESCRIBE = 'user.describe';

    /**
     * the column name for the state field
     */
    const COL_STATE = 'user.state';

    /**
     * the column name for the delete field
     */
    const COL_DELETE = 'user.delete';

    /**
     * the column name for the phonenumber field
     */
    const COL_PHONENUMBER = 'user.phonenumber';

    /**
     * the column name for the avatar field
     */
    const COL_AVATAR = 'user.avatar';

    /**
     * the column name for the code field
     */
    const COL_CODE = 'user.code';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Makh', 'Name', 'Account', 'Password', 'Email', 'Dateregister', 'Birthday', 'Gender', 'Address', 'Describe', 'State', 'Delete', 'Phonenumber', 'Avatar', 'Code', ),
        self::TYPE_CAMELNAME     => array('makh', 'name', 'account', 'password', 'email', 'dateregister', 'birthday', 'gender', 'address', 'describe', 'state', 'delete', 'phonenumber', 'avatar', 'code', ),
        self::TYPE_COLNAME       => array(UserTableMap::COL_MAKH, UserTableMap::COL_NAME, UserTableMap::COL_ACCOUNT, UserTableMap::COL_PASSWORD, UserTableMap::COL_EMAIL, UserTableMap::COL_DATEREGISTER, UserTableMap::COL_BIRTHDAY, UserTableMap::COL_GENDER, UserTableMap::COL_ADDRESS, UserTableMap::COL_DESCRIBE, UserTableMap::COL_STATE, UserTableMap::COL_DELETE, UserTableMap::COL_PHONENUMBER, UserTableMap::COL_AVATAR, UserTableMap::COL_CODE, ),
        self::TYPE_FIELDNAME     => array('makh', 'name', 'account', 'password', 'email', 'dateregister', 'birthday', 'gender', 'address', 'describe', 'state', 'delete', 'phonenumber', 'avatar', 'code', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Makh' => 0, 'Name' => 1, 'Account' => 2, 'Password' => 3, 'Email' => 4, 'Dateregister' => 5, 'Birthday' => 6, 'Gender' => 7, 'Address' => 8, 'Describe' => 9, 'State' => 10, 'Delete' => 11, 'Phonenumber' => 12, 'Avatar' => 13, 'Code' => 14, ),
        self::TYPE_CAMELNAME     => array('makh' => 0, 'name' => 1, 'account' => 2, 'password' => 3, 'email' => 4, 'dateregister' => 5, 'birthday' => 6, 'gender' => 7, 'address' => 8, 'describe' => 9, 'state' => 10, 'delete' => 11, 'phonenumber' => 12, 'avatar' => 13, 'code' => 14, ),
        self::TYPE_COLNAME       => array(UserTableMap::COL_MAKH => 0, UserTableMap::COL_NAME => 1, UserTableMap::COL_ACCOUNT => 2, UserTableMap::COL_PASSWORD => 3, UserTableMap::COL_EMAIL => 4, UserTableMap::COL_DATEREGISTER => 5, UserTableMap::COL_BIRTHDAY => 6, UserTableMap::COL_GENDER => 7, UserTableMap::COL_ADDRESS => 8, UserTableMap::COL_DESCRIBE => 9, UserTableMap::COL_STATE => 10, UserTableMap::COL_DELETE => 11, UserTableMap::COL_PHONENUMBER => 12, UserTableMap::COL_AVATAR => 13, UserTableMap::COL_CODE => 14, ),
        self::TYPE_FIELDNAME     => array('makh' => 0, 'name' => 1, 'account' => 2, 'password' => 3, 'email' => 4, 'dateregister' => 5, 'birthday' => 6, 'gender' => 7, 'address' => 8, 'describe' => 9, 'state' => 10, 'delete' => 11, 'phonenumber' => 12, 'avatar' => 13, 'code' => 14, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('user');
        $this->setPhpName('User');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\AuthBundle\\Model\\User');
        $this->setPackage('AuthBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('makh', 'Makh', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', false, 30, null);
        $this->addColumn('account', 'Account', 'VARCHAR', false, 30, null);
        $this->addColumn('password', 'Password', 'VARCHAR', false, 30, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 30, null);
        $this->addColumn('dateregister', 'Dateregister', 'DATE', false, null, null);
        $this->addColumn('birthday', 'Birthday', 'DATE', false, null, null);
        $this->addColumn('gender', 'Gender', 'VARCHAR', false, 100, null);
        $this->addColumn('address', 'Address', 'VARCHAR', false, 500, null);
        $this->addColumn('describe', 'Describe', 'VARCHAR', false, 1000, null);
        $this->addColumn('state', 'State', 'TINYINT', false, null, null);
        $this->addColumn('delete', 'Delete', 'TINYINT', false, null, null);
        $this->addColumn('phonenumber', 'Phonenumber', 'VARCHAR', false, 30, null);
        $this->addColumn('avatar', 'Avatar', 'VARCHAR', false, 100, null);
        $this->addColumn('code', 'Code', 'VARCHAR', false, 1000, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Makh', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Makh', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Makh', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Makh', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Makh', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Makh', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Makh', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? UserTableMap::CLASS_DEFAULT : UserTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (User object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = UserTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = UserTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + UserTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = UserTableMap::OM_CLASS;
            /** @var User $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            UserTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = UserTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = UserTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var User $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                UserTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(UserTableMap::COL_MAKH);
            $criteria->addSelectColumn(UserTableMap::COL_NAME);
            $criteria->addSelectColumn(UserTableMap::COL_ACCOUNT);
            $criteria->addSelectColumn(UserTableMap::COL_PASSWORD);
            $criteria->addSelectColumn(UserTableMap::COL_EMAIL);
            $criteria->addSelectColumn(UserTableMap::COL_DATEREGISTER);
            $criteria->addSelectColumn(UserTableMap::COL_BIRTHDAY);
            $criteria->addSelectColumn(UserTableMap::COL_GENDER);
            $criteria->addSelectColumn(UserTableMap::COL_ADDRESS);
            $criteria->addSelectColumn(UserTableMap::COL_DESCRIBE);
            $criteria->addSelectColumn(UserTableMap::COL_STATE);
            $criteria->addSelectColumn(UserTableMap::COL_DELETE);
            $criteria->addSelectColumn(UserTableMap::COL_PHONENUMBER);
            $criteria->addSelectColumn(UserTableMap::COL_AVATAR);
            $criteria->addSelectColumn(UserTableMap::COL_CODE);
        } else {
            $criteria->addSelectColumn($alias . '.makh');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.account');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.dateregister');
            $criteria->addSelectColumn($alias . '.birthday');
            $criteria->addSelectColumn($alias . '.gender');
            $criteria->addSelectColumn($alias . '.address');
            $criteria->addSelectColumn($alias . '.describe');
            $criteria->addSelectColumn($alias . '.state');
            $criteria->addSelectColumn($alias . '.delete');
            $criteria->addSelectColumn($alias . '.phonenumber');
            $criteria->addSelectColumn($alias . '.avatar');
            $criteria->addSelectColumn($alias . '.code');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(UserTableMap::DATABASE_NAME)->getTable(UserTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(UserTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(UserTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new UserTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a User or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or User object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \AuthBundle\Model\User) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(UserTableMap::DATABASE_NAME);
            $criteria->add(UserTableMap::COL_MAKH, (array) $values, Criteria::IN);
        }

        $query = UserQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            UserTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                UserTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the user table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return UserQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a User or Criteria object.
     *
     * @param mixed               $criteria Criteria or User object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from User object
        }

        if ($criteria->containsKey(UserTableMap::COL_MAKH) && $criteria->keyContainsValue(UserTableMap::COL_MAKH) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.UserTableMap::COL_MAKH.')');
        }


        // Set the correct dbName
        $query = UserQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // UserTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
UserTableMap::buildTableMap();
