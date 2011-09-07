<?php

/**
 * @author Peep Pullerits <peep.pullerits@gmail.com>
 */

abstract class DatabaseTestCase extends PHPUnit_Extensions_Database_TestCase {
    // Keep the trailing slash
    protected $_datasetDir = 'YOUR_DATASET_DIR_HERE/';

    /* If you want this class to load a YAML dataset for you automatically,
     * override this function and make it return the filename in your
     * datasets directory.
     */
    protected function _getDatasetFileName() {
        
    }


    protected function _getYamlDataSetFile($filePath) {
        return new PHPUnit_Extensions_Database_DataSet_YamlDataSet(
            $this->_datasetDir . $filePath
        );
    }

    public function getDataset() {
        $fileName = $this->_getDatasetFileName();
        if ($fileName) {
            return $this->_getYamlDataSetFile($fileName);
        } else {
            return new PHPUnit_Extensions_Database_DataSet_DefaultDataSet();
        }
    }
}
