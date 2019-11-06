<?php


class MarkdownExtra {
    public function transform($data)
    {
        return '<div>[markdown]' . strip_tags($data) . '[/markdown]</div>';
    }
}

class MarkdownFilter extends \php_user_filter
{

    private $bufferHandle;

    public function filter($in, $out, &$consumed, $closing)
    {
        $data = '';

        // Return a bucket object from the brigade for operating on
        while ($bucket = stream_bucket_make_writeable($in)) {
            $data .= $bucket->data;
            $consumed += $bucket->datalen;// Max size is 8192
        }

        $buffer = '';
        // Create a new bucket for use on the current stream
        $buck = stream_bucket_new($this->bufferHandle, $buffer);

        // If new bucket is not created
        if (false === $buck) {
            return PSFS_ERR_FATAL;
        }

        $parser = new MarkdownExtra;
        $html = $parser->transform($data);
        $buck->data = $html;

        stream_bucket_append($out, $buck);
        return PSFS_PASS_ON;
    }

    public function onCreate()
    {
//        $this->bufferHandle = fopen('php://temp', 'w+');// Also possible
        $this->bufferHandle = fopen('php://memory', 'w+');
        if ($this->bufferHandle) {
            return true;
        }
        return false;
    }

    public function onClose()
    {
        fclose($this->bufferHandle);
    }
}

// Require the MarkdownFilter or autoload

// Register the filter
stream_filter_register("markdown", "MarkdownFilter") or die("Failed to register filter Markdown");

// Apply the filter
$content = file_get_contents('php://filter/read=markdown/resource=file:///mnt/sources/m2-ee/pub/lorem.txt');

// Check for success...
if (false === $content) {
    echo "Unable to read from source\n";
    exit(1);
}

// ...and enjoy the results
echo $content, "<br>";
