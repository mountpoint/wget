<?php

namespace Mountpoint\Wget;

class Wget
{
    /**
     * @var string Full command
     */
    protected $command;

    /**
     * @var array Wget options
     */
    protected $options;

    /**
     * @var string Url
     */
    protected $url;

    /**
     * @var string Output
     */
    protected $output;

    /**
     * Wget constructor.
     *
     * @param $url
     */
    public function __construct($url = '')
    {
        $this->url = $url;
    }

    /**
     * Get full command
     *
     * @return string
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * Set command
     *
     * @param string $command
     *
     * @return $this
     */
    public function setCommand($command)
    {
        $this->command = $command;

        return $this;
    }

    /**
     * Get URL
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set URL
     *
     * @param $url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get full output
     *
     * @return string
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * Set output
     *
     * @param mixed $output
     *
     * @return $this
     */
    public function setOutput($output)
    {
        $this->output = $output;

        return $this;
    }

    /**
     * Add option to options array
     *
     * @param $option
     *
     * @return $this
     */
    public function addOption($option)
    {
        $this->options[] = $option;

        return $this;
    }

    /**
     * Get info about Wget
     *
     * @return $this
     */
    public function version()
    {
        $this->addOption('-V'); // --version

        return $this;
    }

    /**
     * Get help info
     *
     * @return $this
     */
    public function help()
    {
        $this->addOption('-h'); // --help

        return $this;
    }

    /**
     * Execute the command
     *
     * @return $this
     */
    public function exec()
    {
        $this->setCommand('wget' . $this->normalizeOptions() . $this->getUrl());

        $this->setOutput(shell_exec($this->getCommand()));

        return $this;
    }

    /**
     * Normalize options array
     *
     * @return string
     */
    protected function normalizeOptions()
    {
        $options = '';

        if ($this->options) {
            foreach ($this->options as $option) {
                $options .= ' ' . $option;
            }
        }

        return $options;
    }

    public function __destruct()
    {

    }
}
