<?php

namespace App\Http\Controllers;



class CsvFileImporter
{
    /**
     * Import method used for saving file and importing it using a database query
     * 
     * @param Symfony\Component\HttpFoundation\File\UploadedFile $csv_import
     * @return int number of lines imported
     */
    public function import($csv_import)
    {
        // Save file to temp directory
        // print_r("hi");exit;
        $moved_file = $this->moveFile($csv_import);

        // Normalize line endings
        // print_r($moved_file);exit;
        $normalized_file = $this->normalize($moved_file);
        // Import contents of the file into database
        return $this->importFileContents($normalized_file);
    }

    /**
     * Move File to a temporary storage directory for processing
     * temporary directory must have 0755 permissions in order to be processed
     *
     * @param Symfony\Component\HttpFoundation\File\UploadedFile $csv_import
     * @return Symfony\Component\HttpFoundation\File $moved_file
     */
    public function moveFile($csv_import)
    {
        // Check if directory exists make sure it has correct permissions, if not make it
        if (is_dir($destination_directory = storage_path('imports/tmp'))) {
            chmod($destination_directory, 0755);
        } else {
            mkdir($destination_directory, 0755, true);
        }

        // Get file's original name
        $original_file_name = $csv_import->getClientOriginalName();

        // Return moved file as File object
        return $csv_import->move($destination_directory, $original_file_name);
    }

    /**
     * Convert file line endings to uniform "\r\n" to solve for EOL issues
     * Files that are created on different platforms use different EOL characters
     * This method will convert all line endings to Unix uniform
     *
     * @param string $file_path
     * @return string $file_path
     */
    public function normalize($file_path)
    {
        //Load the file into a string
        $string = @file_get_contents($file_path);

        if(!$string) {
            return $file_path;
        }

        //Convert all line-endings using regular expression
        $string = preg_replace('~\r\n?~', "\n", $string);

        file_put_contents($file_path, $string);

        return $file_path;
    }

    /**
     * Import CSV file into Database using LOAD DATA LOCAL INFILE function
     *
     * NOTE: PDO settings must have attribute PDO::MYSQL_ATTR_LOCAL_INFILE => true
     *
     * @param $file_path
     * @return mixed Will return number of lines imported by the query
     */
    private function importFileContents($file_path)
    {
        
        $query = sprintf("LOAD DATA LOCAL INFILE '%s' INTO TABLE customercsv 
            LINES TERMINATED BY '\\n'
            FIELDS TERMINATED BY ',' 
            IGNORE 1 LINES (`content`)", addslashes($file_path));

        $data= \DB::connection()->getpdo()->exec($query);
        print_r($data);exit;
        return $data;
    }
}