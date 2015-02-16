<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace ZfrMailChimpBundle\Services;

use Guzzle\Plugin\Async\AsyncPlugin;
use ZfrMailChimp\Client\MailChimpClient;

class MailChimpHandler
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var bool
     */
    private $async;

    /**
     * Initialize Handler
     *
     * @param string  $apiKey injected via semantic config
     * @param boolean $async optional use of Guzzle Async plugin
     *
     * @return MailChimpHandler
     */
    public function __construct($apiKey, $async = false)
    {
        $this->apiKey = (string) $apiKey;
        $this->async  = (bool) $async;
    }

    /**
     * Create ZFRMailChimp Client
     *
     * @return MailChimpClient $client
     */
    public function getClient()
    {
        $client = new MailChimpClient($this->apiKey);

        if($this->async) {
            $client->addSubscriber(new AsyncPlugin());
        }

        return $client;
    }
}
