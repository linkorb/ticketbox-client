<?php 

namespace Linkorb\TicketBoxClient;

class Ticket
{
    const PATH = 'tickets/';
    
    private $id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    private $subject;

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    private $description;

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    private $state;

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    private $user;

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    private $email;

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    private $org;

    public function getOrg()
    {
        return $this->org;
    }

    public function setOrg($org)
    {
        $this->org = $org;

        return $this;
    }

    private $phone;

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    private $queue_id;

    public function getQueueId()
    {
        return $this->queue_id;
    }

    public function setQueueId($queue_id)
    {
        $this->queue_id = $queue_id;

        return $this;
    }

    private $created_at;

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    private $updated_at;

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    private $error;

    public function getError()
    {
        return $this->error;
    }

    public function setError($error)
    {
        $this->error = $error;

        return $this;
    }

    public function arrayToObject($array)
    {
        $this->setId(isset($array['id']) ? $array['id'] : 'null')
                ->setSubject(isset($array['subject']) ? $array['subject'] : 'null')
                ->setDescription(isset($array['description']) ? $array['description'] : 'null')
                ->setState(isset($array['state']) ? $array['state'] : 'null')
                ->setUser(isset($array['user']) ? $array['user'] : 'null')
                ->setEmail(isset($array['email']) ? $array['email'] : 'null')
                ->setOrg(isset($array['org']) ? $array['org'] : 'null')
                ->setPhone(isset($array['phone']) ? $array['phone'] : 'null')
                ->setQueueId(isset($array['queue_id']) ? $array['queue_id'] : 'null')
                ->setCreatedAt(isset($array['created_at']) ? $array['created_at'] : 'null')
                ->setUpdatedAt(isset($array['updated_at']) ? $array['updated_at'] : 'null');
    }

    public function getActivity($client)
    {
        try {
            $response  = $client->request('GET', self::PATH  . $this->getId() . '/activities');
            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            echo $e->getRequest() . "\n";
            if ($e->hasResponse()) {
                echo $e->getResponse() . "\n";
            }
        }
    }

    public function get($client)
    {
        try {
            $response  = $client->request('GET', self::PATH  .$this->getId());
            $this->arrayToObject(json_decode($response->getBody(), true));
        } catch (RequestException $e) {
            echo $e->getRequest() . "\n";
            if ($e->hasResponse()) {
                echo $e->getResponse() . "\n";
            }
        }
    }

    private function toJSONString()
    {
        if (null !== $this->getUser()) {
            $data = [
                'subject' => $this->getSubject(),
                'description' => $this->getDescription(),
                'user' => '',
                'name' => $this->getUser(),
                'email' => $this->getEmail(),
                'org' => $this->getOrg(),
                'phone' => $this->getPhone(),
            ];
        } else {
            $data = [
                'subject' => $this->getSubject(),
                'description' => $this->getDescription(),
            ];
        }

        return json_encode($data);
    }

    public function create($client)
    {
        $response  = $client->request('POST', self::PATH, [
            'body' => $this->toJSONString()
        ]);

        $jsonDecode = json_decode($response->getBody(), true);

        if (isset($jsonDecode['error'])) {
            $this->setError($jsonDecode['error']['message']);
        } else {
            $this->arrayToObject($jsonDecode);
        }
    }
}
